@extends('adminlte::page')
@section('title', 'SPKPN | Modul A')

@section('plugins.Select2', true)

@section('content_header')
<h1>MODUL A : Maklumat Asas</h1>
@stop

@section('content')
<div class="container-fluid">
        <div class="row">
            @include('layouts.includes.carian_modul')
        </div>
        <div class="callout callout-info">
            <h5>I am an info callout!</h5>
        </div>
        <div class="row">
            <div class="col-md-3">
                <!-- BAR CHART -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Daftar Kampung</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                            <center>
                                <img src="{{ asset('img/village.svg')}}" alt="Girl in a jacket" width="100" height="100"><br/><br/>
                                <h3><div class="d-inline p-1 bg-dark text-black">{{ $kirakg }} buah</div></h3>
                            </center>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer">
                    </div> --}}
                  </div>
                  <!-- /.card -->
            </div>
            <div class="col-md-3">
                <!-- BAR CHART -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Penggerak</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                            <center>
                                <img src="{{ asset('img/teamwork.svg')}}" alt="Girl in a jacket" width="100" height="100"><br/><br/>
                                <h3><div class="d-inline p-1 bg-dark text-black">{{ $kirapengerak }} orang</div></h3>
                            </center>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer">
                    </div> --}}
                  </div>
                  <!-- /.card -->
            </div>
            <div class="col-md-3">
                <!-- BAR CHART -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Penghulu</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="users-list clearfix">
                            <center>
                                <img src="{{ asset('img/man.svg')}}" alt="User Image" width="100" height="100"><br/><br/>
                                <h3><div class="d-inline p-1 bg-dark text-black">{{ $kirapenghulu }} orang</div></h3>
                            </center>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer">
                    </div> --}}
                  </div>
                  <!-- /.card -->
            </div>
            <div class="col-md-3">
                <!-- BAR CHART -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Ketua Kampung/Komuniti</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                            <center>
                                <img src="{{ asset('img/boss.svg')}}" alt="Girl in a jacket" width="100" height="100"><br/><br/>
                                <h3><div class="d-inline p-1 bg-dark text-black">{{ $kiraketuakg }} orang </div></h3>
                            </center>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer">
                    </div> --}}
                  </div>
                  <!-- /.card -->
            </div>
        </div>
</div>
@stop



@section('js')
        <script>
            console.log('Hi!');

            function matchCustom(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Do not display the item if there is no 'text' property
                if (typeof data.text === 'undefined') {
                    return null;
                }

                // `params.term` should be the term that is used for searching
                // `data.text` is the text that is displayed for the data object
                if (data.text.indexOf(params.term) > -1) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.text += ' (matched)';

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $(".js-select2").select2({
                matcher: matchCustom,
                width: 'resolve', // need to override the changed default
                allowClear: false,
            });

            //Dropdown Agensi Penyelaras
            $(document).ready(function () {
                $('#kam_idkawal_selia').on('change', function () {
                    var idAgensi = $(this).val();
                    if (idAgensi) {
                        $.ajax({
                            url: '/agensikawalselia/' + idAgensi,
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                if (data) {
                                    $('#kam_idagensi_penyelaras').empty();
                                    $('#kam_idagensi_penyelaras').focus;
                                    $('#kam_idagensi_penyelaras').append(
                                        '<option value="">-- Pilih Agensi Penyelaras --</option>'
                                    );
                                    $.each(data, function (id, value) {
                                        $('select[name="kam_idagensi_penyelaras"]').append(
                                            '<option value="' + value
                                            .lar_idagensi_penyelaras + '">' +
                                            value.lar_agensi_penyelaras +
                                            '</option>');
                                    });
                                } else {
                                    $('#kam_idagensi_penyelaras').empty();
                                }
                            }
                        });
                    } else {
                        $('#kam_idagensi_penyelaras').empty();
                    }
                });
            });

            //Dropdown Daerah
            $(document).ready(function () {
                $('#kam_idnegeri').on('change', function () {
                    var idNegeri = $(this).val();
                    if (idNegeri) {
                        $.ajax({
                            url: '/daerahbyidnegeri/' + idNegeri,
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                if (data) {
                                    $('#kam_iddaerah').empty();
                                    $('#kam_iddaerah').focus;
                                    $('#kam_iddaerah').append(
                                        '<option value="">-- Pilih Daerah --</option>');
                                    $.each(data, function (id, value) {
                                        $('select[name="kam_iddaerah"]').append(
                                            '<option value="' + value
                                            .dae_iddaerah + '">' + value
                                            .dae_nama_daerah + '</option>');
                                    });
                                } else {
                                    $('#kam_iddaerah').empty();
                                }
                            }
                        });
                    } else {
                        $('#kam_iddaerah').empty();
                    }
                });
            });

            //Dropdown Mukim
            $(document).ready(function () {
                $('#kam_iddaerah').on('change', function () {
                    var idDaerah = $(this).val();
                    if (idDaerah) {
                        $.ajax({
                            url: '/mukimbyiddaerah/' + idDaerah,
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                if (data) {
                                    $('#kam_idmukim').empty();
                                    $('#kam_idmukim').focus;
                                    $('#kam_idmukim').append(
                                        '<option value="">-- Pilih Mukim --</option>');
                                    $.each(data, function (id, value) {
                                        $('select[name="kam_idmukim"]').append(
                                            '<option value="' + value
                                            .muk_idmukim + '">' + value
                                            .muk_nama_mukim + '</option>');
                                    });
                                } else {
                                    $('#kam_idmukim').empty();
                                }
                            }
                        });
                    } else {
                        $('#mukim').empty();
                    }
                });
            });



        </script>
        @stop

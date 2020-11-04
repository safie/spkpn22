@extends('adminlte::page')

@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('title', 'SPKPN | Carian')

@section('content_header')
<h1>Carian Kampung</h1>
@stop

@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Kampung</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <form action="{{ route('kampung@cari') }}" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nama kampung" name="kam_nama_kampung" value="">
                                    <span>
                                        <a class="btn btn-success btn-flat" data-toggle="collapse" href="#filter" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fas fa-filter"></i></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="filter">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="negeri">Negeri</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 80%" id="kam_idnegeri"name="kam_idnegeri" value="">
                                            @foreach($negeri as $negeri_all)
                                                <option value="{{ $negeri_all->neg_idnegeri }}" selected="">
                                                    {{ $negeri_all->neg_nama_negeri }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="daerah">Daerah/Jajahan/Bahagian</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 45%" id="kam_iddaerah" name="kam_iddaerah" value="">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="mukim">Mukim/Daerah(Sarawak)</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 45%" id="kam_idmukim" name="kam_idmukim" value="">
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Agensi Kawal Selia</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 70%" id="kam_idkawal_selia" name="kam_idkawal_selia" value="">
                                            @foreach($agensikawalselia as $agensikawalselia_all)
                                                <option value="{{ $agensikawalselia_all->kws_idkawal_selia }}" selected="">
                                                    {{ $agensikawalselia_all->kws_kawal_selia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Agensi Penyelaras</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 70%" id="kam_idagensi_penyelaras" name="kam_idagensi_penyelaras" value="">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Parlimen</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 80%" id="kam_idparlimen" name="kam_idparlimen" value="">
                                            @foreach($parlimen as $parlimen_all)
                                                <option value="{{ $parlimen_all->par_kodparlimen }}" selected="">
                                                    {{ $parlimen_all->par_kodparlimen }}-{{ $parlimen_all->par_parlimen }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Dun</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 90%" id="dun" name="kam_iddun" value="">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                    <h3 class="card-title">Sebanyak {{ $kira_kg }} kampung telah dijumpai</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped table-bordered" style="width:100%" id="table_kg" name="table_kg">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Kampung</th>
                                <th>Agensi Penyelaras</th>
                                <th>Negeri</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carian as $index => $kampung)
                            <tr>
                                <td>{{ $carian->firstItem()+$index }}</td>
                                <td>
                                    <p>
                                        {{ $kampung->kam_nama_kampung }}
                                    </p>
                                    <div class="d-inline p-2 bg-primary text-white">ID:{{ $kampung->kam_idkampung }}</div>
                                    <div class="d-inline p-1 bg-dark text-white">{{ $kampung->neg_nama_negeri }}</div>
                                    <div class="d-inline p-1 bg-success text-white">{{ $kampung->dae_nama_daerah }}</div>

                                <td>{{ $kampung->kam_idkawal_selia }}</td>
                                <td>{{ $kampung->dae_nama_daerah }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                     {{ $carian->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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

            //Dropdown Dun
            $(document).ready(function () {
                $('#kam_idparlimen').on('change', function () {
                    var idParlimen = $(this).val();
                    if (idParlimen) {
                        $.ajax({
                            url: '/dunidparlimen/' + idParlimen,
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            dataType: "json",
                            success: function (data) {
                                console.log(data);
                                if (data) {
                                    $('#kam_iddun').empty();
                                    $('#kam_iddun').focus;
                                    $('#kam_iddun').append(
                                        '<option value="">-- Pilih Dun --</option>');
                                    $.each(data, function (id, value) {
                                        $('select[name="kam_iddun"]').append(
                                            '<option value="' + value
                                            .dun_koddun + '">' + value.dun_dun +
                                            '</option>');
                                    });
                                } else {
                                    $('#kam_iddun').empty();
                                }
                            }
                        });
                    } else {
                        $('#kam_iddun').empty();
                    }
                });
            });

            $(document).ready(function () {
                $('#table_kg').DataTable({
                    "paging":   false,
                    "ordering": false,
                    "info":     false,
                    "searching": false
                });
            });
        </script>
        @stop

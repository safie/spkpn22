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
            @include('layouts.includes.cari_kg')
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                    <h3 class="card-title">Hasil carian: <p class="d-inline p-1 bg-black text-white">{{ $kira_kg }} buah kampung</p></h3>
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
                                <th>Kampung</th>
                                <th colspan="2">Agensi Kawal Selia - Penyelaras</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carian as $index => $kampung)
                            <tr>
                                <td>{{ $carian->firstItem()+$index }}</td>
                                <td>
                                    <div class="d-inline p-1 bg-primary text-white">{{ $kampung->kam_nama_kampung }}</div><br/>
                                    <span class="badge badge-secondary">ID:{{ $kampung->kam_idkampung }}</span>
                                    <span class="badge badge-secondary">{{ $kampung->negeri->neg_nama_negeri }}</span>
                                    <span class="badge badge-secondary">{{ $kampung->daerah->dae_nama_daerah }}</span>
                                    <span class="badge badge-secondary">{{ $kampung->mukim->muk_nama_mukim }}</span>
                                <td>
                                    <div class="d-inline p-1 bg-danger text-white">{{ $kampung->kawalSelia->kws_sktn_agensi }}</div>
                                    <div class="d-inline p-1 bg-white text-black">{{ $kampung->kawalSelia->kws_kawal_selia }}</div><br/>
                                    <span class="badge badge-secondary">{{ $kampung->agensi->lar_agensi_penyelaras }}</span>
                                </td>
                                <td class="text-center"><a class="btn btn-info" href="#" role="button"><i class="fas fa-info-circle"></i> profil</a></td>
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

    {{-- @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop --}}

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

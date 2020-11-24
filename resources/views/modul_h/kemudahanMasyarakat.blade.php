@extends('adminlte::page')

@section('plugins.Chartjs', true)
@section('plugins.Select2', true)
@section('plugins.Datatables', true)

@section('title', 'SPKPN | Modul H')

@section('content_header')
<h1><div class="d-inline-flex p-1 bg-blue text-white">MODUL H : KEMUDAHAN ASAS</div></h1>
<h3><div class="d-inline-flex p-1 bg-black text-white">Kemudahan Masyarakat</div></h3>

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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Peratus Pengisian Bagi <div class="d-inline p-1 bg-warning text-white">{{ $jumTotal }}</div> Kampung</h3>
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
                  <canvas id="pieChart" style="min-height: 250px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Senarai <div class="d-inline p-1 bg-danger text-white">{{ $jumBelumIsi }}</div> Kampung belum Isi</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="senarai-kg" name="senarai-kg" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kampung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($senaraiBelumIsi as $index => $kampung)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $kampung->kampung }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                        {{-- {{ $senaraiBelumIsi->links() }} --}}
                    </table>

                </div>
            </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>



</div>
@stop

@section('js')

<script>

    /* */
    // ---------------------//
    // - CARTA PIE -//
    // ---------------------//
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
    var pieChartData = {
    labels  : {!!json_encode($chartmodulb->labels)!!},
    datasets: [
        {
        backgroundColor     : {!!json_encode($chartmodulb->colours)!!},
        data                : {!!json_encode($chartmodulb->dataset)!!}
        },
    ]
    }

    var pieChartData = $.extend(true, {}, pieChartData)
    var temp0 = pieChartData.datasets[0]
    pieChartData.datasets[0] = temp0

    var pieChartOptions = {
        maintainAspectRatio : true,
        responsive : true,

    }

    var pieChart = new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieChartData,
        options: pieChartOptions
    });

//Datatables
    $(document).ready(function () {
                $('#senarai-kg').DataTable({
                    "paging":   true,
                    "ordering": false,
                    "info":     false,
                    "searching": true,
                    "pageLength": 5
                });
            });


            // $(".js-select2").select2({
            //     matcher: matchCustom,
            //     width: 'resolve', // need to override the changed default
            //     allowClear: false,
            // });

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

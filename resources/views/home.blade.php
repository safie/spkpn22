@extends('adminlte::page')

@section('plugins.Chartjs', true)


@section('content_header')
    <h1>Fakta Ringkas</h1>
    <sup>kemaskini pada {{ date('d-M-Y H:i:s') }}</sup>
@stop

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-3">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3 class="display-2"> {{ $kampung }} </h3>
              <p>Kampung Aktif</p>

            </div>
            <div class="icon">
                <i class="fas fa-map-marked-alt"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <!-- ./col -->
        <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{$negeri}} </h3>
                <p>Negeri</p>

              </div>
              <div class="icon">
                <i class="fas fa-globe-asia"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{ $agensi }} </h3>
                <p>Agensi Penyelaras</p>

              </div>
              <div class="icon">
                <i class="fas fa-landmark"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-3">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> {{ $kawalselia }} </h3>
                <p>Agensi Kawal Selia</p>

              </div>
              <div class="icon">
                <i class="fas fa-dice-d6"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
          <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Negeri</h3>

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
                    <canvas id="negeriBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-negeri">
                        Petunjuk
                      </button>
                </div>
              </div>
              <!-- /.card -->
        </div>

        <div class="col-md-3">
            <!-- PIE CHART -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Agensi Kawal Selia</h3>

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
                  <canvas id="cartaKawalSelia" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-kawalselia">
                        Petunjuk
                      </button>
                </div>
              </div>
              <!-- /.card -->
        </div>

        <div class="col-md-3">
            <!-- PIE CHART -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Agensi Penyelaras</h3>

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
                  <canvas id="cartaAgensiPenyelaras" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-penyelaras">
                        Petunjuk
                      </button>
                </div>
              </div>
              <!-- /.card -->
        </div>

    </div>
</div>

<div class="modal fade" id="modal-negeri">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Petunjuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered" style="width:100%" id="table_kg" name="negeri_desc">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Singkatan</th>
                        <th>Negeri</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($negerikg_list as $index => $negeri)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $negeri->neg_sktn_negeri }}</td>
                            <td>{{ $negeri->neg_nama_negeri }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-kawalselia">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Petunjuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered" style="width:100%" id="table_kg" name="negeri_desc">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Singkatan</th>
                        <th>Agensi Kawal Selia</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kawalseliakg_list as $index => $kawalselia)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $kawalselia->kws_sktn_agensi }}</td>
                            <td>{{ $kawalselia->kws_kawal_selia }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-penyelaras">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Petunjuk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-striped table-bordered" style="width:100%" id="table_kg" name="negeri_desc">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Agensi Penyelaras</th>
                        <th>Singkatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyelaraskg_list as $index => $penyelaras)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $penyelaras->lar_agensi_penyelaras }}</td>
                            <td>{{ $penyelaras->lar_sktn_agensi }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script>
        //-------------
        //- CARTA NEGERI -
        //-------------
        var barChartCanvas = $('#negeriBarChart').get(0).getContext('2d')
        var areaChartData = {
        labels  : {!!json_encode($chartnegeri->labels)!!},
        datasets: [
            {
            label               : '',
            backgroundColor     : {!! json_encode($chartnegeri->colours)!!},
            data                : {!! json_encode($chartnegeri->dataset)!!}
            },
        ]
        }
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false,
        legend                  : false,
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
        })

        //-------------
        //- CARTA KAWAL SELIA -
        //-------------
        var barChartCanvas = $('#cartaKawalSelia').get(0).getContext('2d')
        var areaChartData = {
        labels  : {!!json_encode($chartkawalselia->labels)!!},
        datasets: [
            {
            label               : '',
            backgroundColor     : {!! json_encode($chartkawalselia->colours)!!},
            data                : {!! json_encode($chartkawalselia->dataset)!!}
            },
        ]
        }
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var pieChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend : false,
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'pie',
        data: barChartData,
        options: pieChartOptions
        })

        //-------------
        //- CARTA AGENSI PENYELARAS -
        //-------------
        var barChartCanvas = $('#cartaAgensiPenyelaras').get(0).getContext('2d')
        var areaChartData = {
        labels  : {!!json_encode($chartpenyelaras->labels)!!},
        datasets: [
            {
            label               : '',
            backgroundColor     : {!! json_encode($chartpenyelaras->colours)!!},
            data                : {!! json_encode($chartpenyelaras->dataset)!!}
            },
        ]
        }
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        barChartData.datasets[0] = temp0

        var pieChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend : false,
        }

        var barChart = new Chart(barChartCanvas, {
        type: 'doughnut',
        data: barChartData,
        options: pieChartOptions
        })



    </script>
@stop

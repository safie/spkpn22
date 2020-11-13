@extends('adminlte::page')
@section('title', 'SPKPN | Modul A')

@section('content_header')
<h1>MODUL A : Maklumat Asas</h1>
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
                    <form action="" method="GET" enctype="multipart/form-data">
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
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Agensi Kawal Selia</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 70%" id="kam_idkawal_selia" name="kam_idkawal_selia" value="">
                                            {{-- <option value="">-- Pilih Agensi Kawal Selia --</option>
                                            @foreach($agensikawalselia as $agensikawalselia_all)
                                                <option value="{{ $agensikawalselia_all->kws_idkawal_selia }}">
                                                    {{ $agensikawalselia_all->kws_kawal_selia }}
                                                </option>
                                            @endforeach --}}
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
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="negeri">Negeri</label>
                                        </div>
                                        <select class="custom-select js-select2" style="width: 80%" id="kam_idnegeri"name="kam_idnegeri" value="">
                                            {{-- <option value="">-- Pilih Negeri --</option>
                                            @foreach($negeri as $negeri_all)
                                                <option value="{{ $negeri_all->neg_idnegeri }}">
                                                    {{ $negeri_all->neg_nama_negeri }}
                                                </option>
                                            @endforeach --}}
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
            <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Bilangan ISI</h3>

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
                          {{  $kira_null }}
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
            <div class="col-md-6">
                <!-- BAR CHART -->
                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Bilangan tidak isi</h3>

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
        </div>
    @stop

@section('title', 'Dashboard Pegawai')

@include('layouts.header')

@include('layouts.navbar')

@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard Pegawai</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Pegawai</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $suratketerangantidakmampucountbd }}</h3>

                            <p>Surat Keterangan Tidak</p>
                            <p style="margin-top: -20px;">Mampu</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $suratkelahirancountbd }}</h3>

                            <p>Surat Kelahiran</p>
                            <p style="margin-top: -20px;">Belum Disetujui</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $suratkematiancountbd }}</h3>

                            <p>Surat Kematian</p>
                            <p style="margin-top: -20px;">Belum Disetujui</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $suratketeranganusahacountbd }}</h3>

                            <p>Surat Keterangan Usaha</p>
                            <p style="margin-top: -20px;">Belum Disetujui</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{-- <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $suratketeranganpengantarcountbd }}</h3>

                            <p>Surat Keterangan Pengantar</p>
                            <p style="margin-top: -20px;">Belum Disetujui</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $suratketerangankelakuanbaikcountbd }}</h3>

                            <p>Surat Keterangan Kelakuan</p>
                            <p style="margin-top: -20px;">Baik</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $suratketeranganijinorangtuawalicountbd }}</h3>

                            <p>Surat Keterangan Ijin</p>
                            <p style="margin-top: -20px;">Orang Tua / Wali</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $suratketeranganbedanamacountbd }}</h3>

                            <p>Surat Keterangan Beda</p>
                            <p style="margin-top: -20px;">Nama</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $suratpernyataanbelumtidakbekerjacountbd }}</h3>

                            <p>Surat Keterangan Pernyataan</p>
                            <p style="margin-top: -20px;">Belum / Tidak Bekerja</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <a href="{{ route('pegawai.pengajuan') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-4 col-6">
                </div>
                <!-- ./col --> --}}
            </div>
            <!-- /.row -->
            <!-- Main row -->
            {{-- <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Sales
                            </h3>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="chart tab-pane active" id="revenue-chart"
                                    style="position: relative; height: 300px;">
                                    <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- TO DO List -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="ion ion-clipboard mr-1"></i>
                                To Do List
                            </h3>

                            <div class="card-tools">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <ul class="todo-list" data-widget="todo-list">
                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo1" id="todoCheck1">
                                        <label for="todoCheck1"></label>
                                    </div>
                                    <!-- todo text -->
                                    <span class="text">Design a nice theme</span>
                                    <!-- Emphasis label -->
                                    <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo2" id="todoCheck2"
                                            checked>
                                        <label for="todoCheck2"></label>
                                    </div>
                                    <span class="text">Make the theme responsive</span>
                                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo3" id="todoCheck3">
                                        <label for="todoCheck3"></label>
                                    </div>
                                    <span class="text">Let theme shine like a star</span>
                                    <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo4" id="todoCheck4">
                                        <label for="todoCheck4"></label>
                                    </div>
                                    <span class="text">Let theme shine like a star</span>
                                    <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo5" id="todoCheck5">
                                        <label for="todoCheck5"></label>
                                    </div>
                                    <span class="text">Check your messages and notifications</span>
                                    <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo6" id="todoCheck6">
                                        <label for="todoCheck6"></label>
                                    </div>
                                    <span class="text">Let theme shine like a star</span>
                                    <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                    <div class="tools">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-trash-o"></i>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i>
                                Add item</button>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map card -->
                    <div class="card bg-gradient-primary">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="fas fa-map-marker-alt mr-1"></i>
                                Visitors
                            </h3>
                            <!-- card tools -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                    <i class="far fa-calendar-alt"></i>
                                </button>
                                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <div class="card-body">
                            <div id="world-map" style="height: 250px; width: 100%;"></div>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-footer bg-transparent">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <div id="sparkline-1"></div>
                                    <div class="text-white">Visitors</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-2"></div>
                                    <div class="text-white">Online</div>
                                </div>
                                <!-- ./col -->
                                <div class="col-4 text-center">
                                    <div id="sparkline-3"></div>
                                    <div class="text-white">Sales</div>
                                </div>
                                <!-- ./col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle"
                                        data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col -->
            </div> --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Table List Data Status Pengajuan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name Surat</th>
                                        <th>Jumlah Pengajuan</th>
                                        <th>Disetujui</th>
                                        <th>Belum Disetujui</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Surat Keterangan Tidak Mampu</td>
                                        <td>{{ $suratketerangantidakmampucount }}</td>
                                        <td>{{ $suratketerangantidakmampucountd }}</td>
                                        <td>{{ $suratketerangantidakmampucountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Surat Kelahiran</td>
                                        <td>{{ $suratkelahirancount }}</td>
                                        <td>{{ $suratkelahirancountd }}</td>
                                        <td>{{ $suratkelahirancountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Surat Kematian</td>
                                        <td>{{ $suratkematiancount }}</td>
                                        <td>{{ $suratkematiancountd }}</td>
                                        <td>{{ $suratkematiancountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Surat Keterangan Usaha</td>
                                        <td>{{ $suratketeranganusahacount }}</td>
                                        <td>{{ $suratketeranganusahacountd }}</td>
                                        <td>{{ $suratketeranganusahacountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Surat Keterangan Pengantar</td>
                                        <td>{{ $suratketeranganpengantarcount }}</td>
                                        <td>{{ $suratketeranganpengantarcountd }}</td>
                                        <td>{{ $suratketeranganpengantarcountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Surat Keterangan Kelakuan Baik</td>
                                        <td>{{ $suratketerangankelakuanbaikcount }}</td>
                                        <td>{{ $suratketerangankelakuanbaikcountd }}</td>
                                        <td>{{ $suratketerangankelakuanbaikcountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Surat Keterangan Ijin Orang Tua / Wali</td>
                                        <td>{{ $suratketeranganijinorangtuawalicount }}</td>
                                        <td>{{ $suratketeranganijinorangtuawalicountd }}</td>
                                        <td>{{ $suratketeranganijinorangtuawalicountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Surat Keterangan Beda Nama</td>
                                        <td>{{ $suratketeranganbedanamacount }}</td>
                                        <td>{{ $suratketeranganbedanamacountd }}</td>
                                        <td>{{ $suratketeranganbedanamacountbd }}</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Surat Pernyataan Belum / Tidak Bekerja</td>
                                        <td>{{ $suratpernyataanbelumtidakbekerjacount }}</td>
                                        <td>{{ $suratpernyataanbelumtidakbekerjacountd }}</td>
                                        <td>{{ $suratpernyataanbelumtidakbekerjacountbd }}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>Name Surat</th>
                                        <th>Jumlah Pengajuan</th>
                                        <th>Disetujui</th>
                                        <th>Belum Disetujui</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('layouts.footer')

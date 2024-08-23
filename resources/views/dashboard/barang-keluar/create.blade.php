@extends('dashboard.layout')

@section('container')
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    @include('partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Barang Masuk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Tambah Data Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="/dashboard/barang-masuk" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <div class="row col-sm-6">
                        <label>Nama Barang</label>
                        <select class="form-control" name="barangs_id" id="barangs_id">
                          <option>Nama Barang</option>
                          @foreach ($barang as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>  
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jumlah">Jumlah Barang</label>
                      <input type="number" class="form-control" name="jumlah_barang" id="jumlah" placeholder="jumlah Barang">
                    </div>
                    <div class="form-group">
                      <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" name="satuan" id="satuan" placeholder="pcs">
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
                <!-- /.card -->
              </div>
          </div>
          <!-- /.row -->
          
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    @include('partials.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
@endsection
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
              <h1 class="m-0">Data Barang</h1>
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
                <form action="/dashboard/barang" method="POST">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                      <label for="kategori_barang">kategori Barang</label>
                      <input type="text" class="form-control" name="kategori_barang" id="kategori_barang" placeholder="kategori Barang">
                    </div>
                    <div class="form-group">
                      <label for="harga_barang">Harga Barang</label>
                      <input type="number" class="form-control" name="harga_barang" id="harga_barang" placeholder="Harga Barang">
                    </div>
                    <div class="form-group">
                      <label for="stok_barang">Stok</label>
                      <input type="number" class="form-control" name="stok_barang" id="stok_barang" placeholder="Stok Barang" value="0">
                    </div>
                    <div class="form-group">
                      <label for="satuan">Satuan</label>
                      <input type="text" class="form-control" name="satuan" id="kategori_barang" placeholder="pcs">
                    </div>
                    <div class="form-group">
                      <div class="row col-sm-6">
                        <label>Supplier</label>
                        <select class="form-control" name="suppliers_id" id="supplier_id">
                          <option>Supplier</option>
                          @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>  
                          @endforeach
                        </select>
                      </div>
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
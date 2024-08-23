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
              <h1 class="m-0">Data Supplier</h1>
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
                  <h3 class="card-title">Edit Data Supplier</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="/dashboard/supplier/{{ $supplier->id }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{$supplier->id}}">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama_supplier">Nama Supplier</label>
                      <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama Supplier" value="{{ old('nama_supplier', $supplier->nama_supplier) }}">
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No. Hp</label>
                      <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor Hp" value="{{ old('no_hp', $supplier->no_hp) }}">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                    </div>
                    <div class="form-group">
                      <textarea name="alamat" id="alamat" cols="70" rows="5" class="form-control" value="{{ $supplier->id }}">{{ $supplier->alamat }}</textarea>
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
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
                <div class="card">
                  @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> 
                  @endif
                  <div class="card-header">
                    <a href="/dashboard/supplier/create" class="card-title btn btn-primary">
                      <i class="fas fa-plus"></i>
                      Tambah Data Supplier
                    </a>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-left" placeholder="Search">
    
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Supplier</th>
                          <th>No. Hp</th>
                          <th>Alamat</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($suppliers as $supplier)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->no_hp }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>
                              <a href="/edit-supplier/{{ $supplier->id }}" class="btn-sm btn-primary py-1">
                                  <i class="nav-icon fas fa-eye"></i>
                                  Lihat
                              </a> |
                              <a href="/dashboard/supplier/{{ $supplier->id }}/edit" class="btn-sm btn-warning text-white py-1">
                                  <i class="nav-icon fas fa-pen"></i>
                                  Edit
                              </a> |
                              <form action="/dashboard/supplier/{{ $supplier->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn-sm btn-danger py-1 border-0" onclick="return confirm('Anda yakin untuk menghapusnya?')">
                                  <i class="nav-icon fas fa-trash"></i>
                                  Hapus
                                </button>
                              </form>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
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
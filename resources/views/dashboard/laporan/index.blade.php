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
              <h1 class="m-0">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
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
                  <div class="card-header">
                    <h3 class="card-title">Laporan Barang Masuk</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Barang</th>
                          <th>Kategori Barang</th>
                          <th>Jumlah Barang</th>
                          <th>Satuan</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($barangMasuk as $item)    
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->barang->nama_barang }}</td>
                            <td>{{ $item->barang->kategori_barang }}</td>
                            <td>{{ $item->jumlah_barang }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->created_at }}</td>
                          </tr>
                        @endforeach --}}
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Laporan Transaksi</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Nama Pelanggan</th>
                          <th>Total Harga</th>
                          <th>Cash</th>
                          <th>Kembalian</th>
                          <th>Tanggal</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- @foreach ($transaksi as $item)    
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pelanggan->nama }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->cash, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->cash - $item->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $item->created_at }}</td>
                          </tr>
                        @endforeach --}}
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

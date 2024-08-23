@extends('kasir.layout')

@section('container')
<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <span class="navbar-brand mb-0 h1">Hi, Angga! Welcome To Sunforus Minimarket</span>
  </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="mt-4">Cari Barang</h3>
            <form id="search-form" class="d-flex mb-3">
                <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Daftar Item</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="item-list">
                                @foreach($barangs as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>{{ $item->nama_barang }}</td>
                                    <td><input type="number" class="form-control jumlah-barang" data-harga="{{ $item->harga_barang }}" value="0" min="1"></td>
                                    <td>Rp {{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                                    <td class="total-harga">Rp {{ number_format($item->harga_barang, 0, ',', '.') }}</td>
                                    <td><button class="btn btn-danger btn-sm hapus-barang">Hapus</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form id="pos-form">
                @csrf
                <div class="card mb-4">
                    <div class="card-header">
                        <h5>Ringkasan Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Item: <strong id="total-item">0</strong></p>
                        <p>Total Bayar: <strong id="total-bayar">Rp 0</strong></p>
                        <!-- Cash -->
                        <div class="form-group">
                            <label>Cash</label>
                            <input type="number" class="form-control" name="cash" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for Receipt -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="receiptModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="receiptModalLabel">Struk Transaksi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p><strong>ID Transaksi:</strong> <span id="receipt-id"></span></p>
          <p><strong>Total Item:</strong> <span id="receipt-total-item"></span></p>
          <p><strong>Total Bayar:</strong> <span id="receipt-total-bayar"></span></p>
          <p><strong>Cash:</strong> <span id="receipt-cash"></span></p>
          <p><strong>Kembalian:</strong> <span id="receipt-change"></span></p>
          <h5>Detail Barang:</h5>
          <ul id="receipt-items"></ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
</div>

@endsection

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateTotal() {
                let totalItems = 0;
                let totalBayar = 0;

                $('.jumlah-barang').each(function() {
                    const jumlah_barang = parseInt($(this).val());
                    const harga_barang = parseInt($(this).data('harga'));
                    const total = jumlah_barang * harga_barang;

                    totalItems += jumlah_barang;
                    totalBayar += total;

                    $(this).closest('tr').find('.total-harga').text('Rp ' + total.toLocaleString('id-ID'));
                });

                $('#total-item').text(totalItems);
                $('#total-bayar').text('Rp ' + totalBayar.toLocaleString('id-ID'));
            }

            $(document).on('change', '.jumlah-barang', function() {
                updateTotal();
            });

            $(document).on('click', '.hapus-barang', function() {
                $(this).closest('tr').remove();
                updateTotal();
            });

            updateTotal();

            $('#search-form').on('submit', function(e) {
                e.preventDefault();
                const query = $('#search-input').val();
                searchBarang(query);
            });

            function searchBarang(query) {
                $.ajax({
                    url: '/api/barang/search',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        displaySearchResults(response.barangs);
                    }
                });
            }

            function displaySearchResults(barangs) {
                let html = '';
                barangs.forEach(barang => {
                    html += `
                        <tr data-id="${barang.id}" data-nama="${barang.nama_barang}" data-harga="${barang.harga_barang}">
                            <td>${barang.nama_barang}</td>
                            <td>
                                <input type="number" class="form-control jumlah-barang" data-harga="${barang.harga_barang}" value="1" min="1">
                            </td>
                            <td>Rp ${barang.harga_barang.toLocaleString('id-ID')}</td>
                            <td class="total-harga">Rp ${barang.harga_barang.toLocaleString('id-ID')}</td>
                            <td><button class="btn btn-danger btn-sm hapus-barang">Hapus</button></td>
                        </tr>
                    `;
                });
                $('#item-list').html(html);
                updateTotal();
            }

            $('#pos-form').on('submit', function(e) {
                e.preventDefault();

                let items = [];
                let isValid = true;

                $('.jumlah-barang').each(function() {
                    let jumlah_barang = parseInt($(this).val());
                    let barangs_id = $(this).closest('tr').data('id');

                    if (!barangs_id || isNaN(jumlah_barang) || jumlah_barang < 1) {
                        isValid = false;
                        alert('Invalid item data. Please check your inputs.');
                        return false;
                    }

                    items.push({
                        barangs_id: barangs_id,
                        jumlah_barang: jumlah_barang
                    });
                });

                if (!isValid) {
                    return;
                }

                let cash = parseInt($('input[name="cash"]').val());
                let total_harga = parseInt($('#total-bayar').text().replace('Rp ', '').replace(/\./g, ''));

                if (isNaN(cash) || isNaN(total_harga) || cash < total_harga) {
                    alert('Invalid cash amount. Please ensure the cash is a number and at least equal to the total amount.');
                    return;
                }

                $.ajax({
                    url: '/dashboard/transaksi',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        items: items,
                        cash: cash,
                        total_harga: total_harga
                    }),
                    success: function(response) {
                        $('#receipt-id').text(response.transaksis_id);
                        $('#receipt-total-item').text(items.reduce((acc, item) => acc + item.jumlah_barang, 0));
                        $('#receipt-total-bayar').text('Rp ' + total_harga.toLocaleString('id-ID'));
                        $('#receipt-cash').text('Rp ' + cash.toLocaleString('id-ID'));
                        $('#receipt-change').text('Rp ' + response.change.toLocaleString('id-ID'));

                        let receiptItemsHtml = '';
                        items.forEach(item => {
                            let itemName = $('tr[data-id="' + item.barangs_id + '"]').data('nama');
                            receiptItemsHtml += `<li>${itemName} - ${item.jumlah_barang}</li>`;
                        });
                        $('#receipt-items').html(receiptItemsHtml);

                        $('#receiptModal').modal('show');

                        $('#pos-form')[0].reset();
                        $('#item-list').empty();
                        $('#total-item').text('0');
                        $('#total-bayar').text('Rp 0');

                        window.location.href = '/kasir' + response.transaksis_id;
                    },
                    error: function(response) {
                        if (response.responseJSON && response.responseJSON.errors) {
                            let errors = response.responseJSON.errors;
                            let message = 'Transaksi Gagal: ';
                            for (let key in errors) {
                                message += errors[key] + ' ';
                            }
                            alert(message.trim());
                        } else {
                            alert('Transaksi Gagal: ' + response.responseJSON.message);
                        }
                    }
                });
            });
        });
    </script>
@endpush

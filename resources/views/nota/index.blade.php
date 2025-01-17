@extends('masters', ['title' => 'Home'])

@section('content')
<div class="d-flex justify-content-between items-center">
    <a href="{{ route('purchased.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    <button id="cetakNota" class="btn btn-primary">
        <i class="fas fa-print"></i> Cetak Nota
    </button>
</div>

<div class="card mt-2">
    <div class="card-body text-center">
        <h1>Happy Laundry Coin</h1>
        <h6>Jalan Ketintang Gang Nirwana No. 127C RT 12 RW 04, Wonokromo, Surabaya</h6>
        <br>
        <h5>No Pelanggan : #{{ $userPurchased->user->no_pelanggan }}</h5>
        <h3>Nama Pelanggan : {{ $userPurchased->user->name }}</h3>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Spesifikasi Cuci</th>
                    <th>Quantity</th>
                    <th>Harga/kilo</th>
                    <th>Sub Total</th>
                    <th>Metode Pembayaran</th>
                    <th>Pemesanan</th>
                    <th>Alamat</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $userPurchased->spesification->spesifikasi_cuci }}</td>
                    <td>{{ $userPurchased->quantity_laundry }}</td>
                    <td>Rp {{ number_format($userPurchased->spesification->hargakilo, 0, ',', '.') }}/kg</td>
                    <td>Rp {{ number_format($userPurchased->subtotal_laundry, 0, ',', '.') }}</td>
                    <td>{{ $userPurchased->payment_method ? $userPurchased->payment_method->payment_method_name : 'Tidak tersedia' }}</td>
                    <td>{{ $userPurchased->user->alamat ? "diantar" : "tidak diantar" }}</td>
                    <td>{{ $userPurchased->user->alamat ? $userPurchased->user->alamat : "-" }}</td>
                    <td>
                        <p class="text-danger fw-bold">{{ $userPurchased->status_laundry }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    var cetakNotaButton = document.getElementById('cetakNota');

    cetakNotaButton.addEventListener('click', function () {
        window.print();
    });
</script>

@endsection

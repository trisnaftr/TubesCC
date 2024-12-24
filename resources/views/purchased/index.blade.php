@extends('masters', ['title' => 'Home'])

@section('content')

<div class="text-center my-4">
    <img class="img-thumbnail" 
         src="{{ Vite::asset('resources/images/Laundry.png') }}" 
         style="width: 30%" 
         alt="Laundry">
</div>

<div class="card mx-auto" style="max-width: 80%;">
    <div class="card-header bg-secondary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h3>Data Customer</h3>
            <a href="{{ route('purchased.create') }}" class="text-white btn btn-sm btn-success">
                <i class="fas fa-user-plus"></i> Tambah Customer
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-secondary">
                    <tr>
                        <th>ID Customer</th>
                        <th>Nama</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Riwayat Cuci</th>
                        <th>Quantity Laundry</th>
                        <th>Sub Total</th>
                        <th>Nota</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($userPurchaseds as $item)
                    <tr>
                        <td>#{{ $item->user->no_pelanggan }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->user->no_telp }}</td>
                        <td>{{ $item->user->alamat }}</td>
                        <td>{{ $item->spesification->spesifikasi_cuci }}</td>
                        <td>{{ $item->quantity_laundry }} kg</td>
                        <td>Rp {{ number_format($item->subtotal_laundry, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('nota.index', $item->user_id) }}" 
                               class="btn btn-sm btn-info">
                                <i class="fas fa-file-alt"></i> Nota
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('nota.delete', $item->user_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Data Customer tidak tersedia.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@extends('masters', ['title' => 'Set Customer'])

@section('content')

<div class="text-center my-4">
    <img class="img-thumbnail" 
         src="{{ Vite::asset('resources/images/Laundry.png') }}" 
         style="width: 30%" 
         alt="Laundry">
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="mb-0 text-light">Set Customer <i class="fas fa-user"></i></h5>
            </div>
            <div class="card-body">
                <form action="{{ \Route::currentRouteName() == 'purchased.edit' ? route('purchased.update', $bind->id ?? '') : route('purchased.store') }}" method="post">
                    @csrf
                    @if(\Route::currentRouteName() == 'purchased.edit')
                        @method('patch')
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nama Customer</label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name', $bind->user->name ?? '') }}" required>
                            <input type="hidden" name="tanggal_mulai_laundry" value="{{ now() }}">
                        </div>
                        <div class="col-md-6">
                            <label for="no_telp">No Telp</label>
                            <input class="form-control" type="text" name="no_telp" id="no_telp"
                                value="{{ old('no_telp', $bind->user->no_telp ?? '') }}" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="spesification_id">Spesifikasi Cuci</label>
                            <select class="form-control" name="spesification_id" id="spesification_id" required>
                                <option value="" disabled selected>-- Pilih Spesifikasi Cuci --</option>
                                @foreach($spesifications as $spesification)
                                    <option value="{{ $spesification->id }}" {{ old('spesification_id', $bind->spesification_id ?? '') == $spesification->id ? 'selected' : '' }}>
                                        {{ $spesification->spesifikasi_cuci }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" disabled selected>-- Pilih Gender --</option>
                                <option value="L" {{ old('gender', $bind->user->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('gender', $bind->user->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="quantity_laundry">Quantity Laundry</label>
                            <input class="form-control" type="number" name="quantity_laundry" id="quantity_laundry"
                                value="{{ old('quantity_laundry', $bind->quantity_laundry ?? '') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_selesai_laundry">Tanggal Selesai</label>
                            <input class="form-control" type="date" name="tanggal_selesai_laundry" id="tanggal_selesai_laundry"
                                value="{{ old('tanggal_selesai_laundry', $bind->tanggal_selesai_laundry ?? '') }}" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="diantarCheckbox">Pesanan Diantar?</label>
                            <div>
                                <input type="checkbox" id="diantarCheckbox" {{ old('alamat', $bind->user->alamat ?? '') ? 'checked' : '' }}> Iya
                            </div>
                        </div>
                        <div class="col-md-6" id="alamatInput" style="{{ old('alamat', $bind->user->alamat ?? '') ? '' : 'display:none;' }}">
                            <label for="alamat">Alamat</label>
                            <input class="form-control" type="text" name="alamat" id="alamat"
                                value="{{ old('alamat', $bind->user->alamat ?? '') }}">
                        </div>
                    </div>

                    <button id="checkButton" class="btn btn-primary mt-4" type="submit">
                        <i class="fas fa-check"></i> Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-secondary">
                <h5 class="mb-0 text-light">Daftar Harga <i class="fas fa-list-alt"></i></h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Spesifikasi Cuci</th>
                            <th>Harga/kilo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($spesifications as $index => $spesification)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $spesification->spesifikasi_cuci }}</td>
                            <td>Rp {{ number_format($spesification->hargakilo, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('diantarCheckbox').addEventListener('change', function () {
        var alamatInput = document.getElementById('alamatInput');
        alamatInput.style.display = this.checked ? 'block' : 'none';
    });
</script>

@endsection

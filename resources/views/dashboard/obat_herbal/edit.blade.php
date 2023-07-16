@extends('dashboard.layout.main')

@section('container')
    <h1>Edit Data Obat Herbal</h1>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="container">
                
                <form action="/dashboard/obat-herbal/{{ $obat->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="nama_obat" class="col-4 col-form-label ">Nama Obat Herbal</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" id="nama_obat" value="{{ old('nama_obat', $obat->nama_obat) }}">
                            @error('nama_obat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-4 col-form-label">Harga</label>
                        <div class="col-8">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga', $obat->harga) }}">
                            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
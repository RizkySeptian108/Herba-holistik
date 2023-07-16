@extends('dashboard.layout.main')

@section('container')
    <h1>Tambah Terapi</h1>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="container">
                
                <form action="/dashboard/terapi" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="nama_terapi" class="col-4 col-form-label ">Nama Terapi</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('nama_terapi') is-invalid @enderror" name="nama_terapi" id="nama_terapi" value="{{ old('nama_terapi') }}">
                            @error('nama_terapi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-4 col-form-label">Harga</label>
                        <div class="col-8">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">
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
@extends('dashboard.layout.main')

@section('container')
    <h1>Edit Terapi</h1>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="container">
                
                <form action="/dashboard/terapi/{{ $terapi->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="nama_terapi" class="col-4 col-form-label ">Nama Obat Herbal</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('nama_terapi') is-invalid @enderror" name="nama_terapi" id="nama_terapi" value="{{ old('nama_terapi', $terapi->nama_terapi) }}">
                            @error('nama_terapi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-4 col-form-label">Harga</label>
                        <div class="col-8">
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga', $terapi->harga) }}">
                            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $terapi->gambar }}">
                        @if ($terapi->gambar)
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/' . $terapi->gambar) }}">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewImage()">
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

    <script>
        function previewImage(){
        const img = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(img.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script>
@endsection
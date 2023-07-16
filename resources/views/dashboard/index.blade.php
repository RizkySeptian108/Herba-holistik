@extends('dashboard.layout.main')

@section('container')

<div class="container my-2">

    <h1>Akun</h1>

    <div class="row mt-3">
      <div class="col-sm-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if (auth()->user()->foto === null)
                  <img src="/img/default.png" class="img-fluid rounded-start" alt="{{ auth()->user()->nama}}">
                  <a href="https://www.flaticon.com/free-icons/user" title="user icons">User icons created by Freepik - Flaticon</a>
                @else 
                  <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-fluid rounded-start" alt="{{ auth()->user()->nama}}">
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ auth()->user()->nama}}</h5>
                  <p class="card-text">{{ auth()->user()->alamat }}</p>
                  <p class="card-text"><small class="text-body-secondary">{{ auth()->user()->jenis_kelamin }}</small></p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#changeImg" aria-expanded="false" aria-controls="changeImg">
          Change image
        </button>
        <div class="collapse mt-3" id="changeImg">
          <div class="card card-body">
            <form action="user/changepicture" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="foto" class="form-label">Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
                @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>
              <div class="mb-3">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div> 
    </div>


</div>


<script>
  function previewImage(){
        const img = document.querySelector('#image');
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
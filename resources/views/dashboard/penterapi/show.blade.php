@extends('dashboard.layout.main')

@section('container')

<div class="container my-2">

    <h1>Detail Penterapi</h1>

    <div class="row mt-3">
      <div class="col-sm-6">
        <div class="card mb-3 p-2" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                @if ($penterapi->foto === null)
                  <img src="/img/default.png" class="img-fluid rounded-start" alt="{{ $penterapi->nama}}">
                  <a href="https://www.flaticon.com/free-icons/user" title="user icons">User icons created by Freepik - Flaticon</a>
                @else 
                  <img src="{{ asset('storage/' . $penterapi->foto) }}" class="img-fluid rounded-start" alt="{{ $penterapi->nama}}">
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{ $penterapi->nama}}</h5>
                  <p class="card-text">{{ $penterapi->alamat }}</p>
                  <p class="card-text"><small class="text-body-secondary">{{ $penterapi->jenis_kelamin }}</small></p>
                  <p class="card-text"><small class="text-body-secondary">{{ $penterapi->usia }} tahun</small></p>
                  <p class="card-text"><small class="text-body-secondary">{{ $penterapi->created_at }}</small></p>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <a href="/dashboard/penterapi" class="btn btn-primary">kembali</a>
      </div> 
    </div>


</div>

@endsection
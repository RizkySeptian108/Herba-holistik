@extends('dashboard.layout.main')

@section('container')

<div class="container">
    <h1>Halaman Pendaftaran</h1>
    <div class="row mt-5">
        <div class="col-md-6">
            <a href="/dashboard/pendaftaran/create" class="btn btn-primary">Tambah Pendaftaran</a>
        </div>
    </div>
    @if (session('success'))    
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
    @endif
    
    <div class="d-flex justify-content-center mt-2">
        {{ $pendaftarans->links() }}
    </div>    
    <div class="row">
        <div class="table-responsive table-bordered col-md-12 ml-auto mr-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pasien</th>
                        <th>Berat Badan</th>
                        <th>Keluhan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftarans as $pendaftaran )
                    <tr>
                        <td>{{ $loop->iteration + $pendaftarans->firstItem() - 1 }}</td>
                        <td>{{ $pendaftaran->pasien->nama_pasien }}</td>
                        <td>{{ $pendaftaran->berat_badan }}</td>
                        <td>{{ $pendaftaran->keluhan }}</td>
                        <td>{{ $pendaftaran->created_at }}</td>
                        <td>
                            <a href="/dashboard/pendaftaran/{{ $pendaftaran->id }}/edit"><span class="badge text-bg-warning">ubah</span></a> / 
                            <form action="/dashboard/pendaftaran/{{ $pendaftaran->id }}" method="post" class="d-inline">@method('delete') @csrf <button class="badge text-bg-danger border-0" type="submit">hapus</button></form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $pendaftarans->links() }}
    </div>
    


    
@endsection
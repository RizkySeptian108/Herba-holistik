@extends('dashboard.layout.main')

@section('container')
    <h1>Obat Herbal</h1>

    <div class="container">
        <div class="row mt-5">
            <div class="col"><a href="/dashboard/obat-herbal/create" class="btn btn-primary">Tambah</a></div>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <strong>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="table-responsive table-bordered col-md-6 ml-auto mr-auto mt-2">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Obat Herbal</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($obat as $obt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $obt->nama_obat }}</td>
                            <td>{{ $obt->harga }}</td>
                            <td><a href="/dashboard/obat-herbal/{{ $obt->id }}/edit"><span class="badge text-bg-warning">ubah</span></a> / <form action="/dashboard/obat-herbal/{{ $obt->id }}" method="post" class="d-inline">@method('delete') @csrf <button class="badge text-bg-danger border-0" type="submit" onclick="return confirm('Anda yakin?')">hapus</button></form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
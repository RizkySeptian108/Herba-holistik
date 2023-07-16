@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1>Halaman Data Terapi</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="/dashboard/terapi/create" class="btn btn-primary">Tambah Terapi</a>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive table-bordered col-md-6 ml-auto mr-auto mt-2">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Terapi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terapi as $terapi)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $terapi->nama_terapi }}</td>
                            <td>{{ $terapi->harga }}</td>
                            <td><a href="/dashboard/terapi/{{ $terapi->id }}/edit"><span class="badge text-bg-warning">ubah</span></a> / <form action="/dashboard/terapi/{{ $terapi->id }}" method="post" class="d-inline">@method('delete') @csrf <button class="badge text-bg-danger border-0" type="submit" onclick="return confirm('Anda yakin?')">hapus</button></form></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>    



@endsection
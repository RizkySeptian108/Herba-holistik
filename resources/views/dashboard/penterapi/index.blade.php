@extends('dashboard.layout.main')

@section('container')
    <div class="container">
        <h1>Halaman Data Penterapi</h1>
        <div class="row mt-5">
            <div class="col-md-6">
                <a href="/dashboard/penterapi/create" class="btn btn-primary">Tambah Terapi</a>
            </div>
        </div>
        @if (session('success'))    
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif
        
        <div class="row">
            <div class="table-responsive table-bordered col-md-12 ml-auto mr-auto mt-2">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penterapi as $ptp)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ptp->nama }}</td>
                            <td>{{ $ptp->username }}</td>
                            <td>{{ $ptp->jenis_kelamin }}</td>
                            <td>
                                <a href="/dashboard/penterapi/{{ $ptp->id }}"><span class="badge text-bg-success">detail</span></a> / 
                                <a href="/dashboard/penterapi/{{ $ptp->id }}/edit"><span class="badge text-bg-warning">ubah</span></a> / 
                                <form action="/dashboard/penterapi/{{ $ptp->id }}" method="post" class="d-inline">@method('delete') @csrf <button class="badge text-bg-danger border-0" type="submit" onclick="return confirm('Anda yakin?')">hapus</button></form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>    



@endsection
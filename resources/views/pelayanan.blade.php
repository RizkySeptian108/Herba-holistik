@extends('layout.main')

@include('layout.navbar')

@section('container')
    <div class="container my-2 ">
        <h1 class="m-2 text-center">Daftar Pasien</h1>
        <div class="row ">
            <form action="/pelayanan" class="d-flex justify-content-between" method="get">
            <div class="col-sm-3 d-flex">
                <input type="date" name="date" id="date" class="form-control me-2" value="{{ $old['date'] }}">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
            <div class="col-sm-3 d-flex">
                <input type="text" name="keyword" id="keyword" class="form-control me-2" placeholder="Cari nama" value="{{ $old['keyword'] }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>    
            </form>    
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pasien</th>
                            <th scope="col">Berat Badan</th>
                            <th scope="col">Keluhan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                            <tr class="">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $pendaftaran->pasien->nama_pasien }}</td>
                                <td>{{ $pendaftaran->berat_badan }}</td>
                                <td>{{ $pendaftaran->keluhan }}</td>
                                <td>{{ $pendaftaran->status }}</td>
                                <td>{{ $pendaftaran->created_at }}</td>
                                <td><a href="/pelayanan/periksa/{{ $pendaftaran->pasien_id }}" class="btn btn-primary">Periksa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
  
@endsection


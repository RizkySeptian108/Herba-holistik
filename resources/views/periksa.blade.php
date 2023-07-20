@extends('layout.main')

@include('layout.navbar')

@section('container')
    <div class="container my-2">
        <h1>Halaman Pemeriksaan</h1>
        <div class="row justify-content-center">
            <div class="col-4">
                <table class="table table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{ $pasien->nama_pasien }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{ $pasien->alamat }}</td>
                    </tr>
                    <tr>
                        <td>Usia</td>
                        <td>:</td>
                        <td>{{ $pasien->usia }}</td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ $pasien->agama }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{ $pasien->pekerjaan }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Diagnosa</th>
                            <th scope="col">Terapi</th>
                            <th scope="col">Obat Herbal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                            <tr class="">
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $pendaftaran->created_at }}</td>
                                <td>{{ $pendaftaran->diagnosa }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $pendaftaran->nama }}</td>
                                <td><button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalInput">Input</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalInput" tabindex="-1" aria-labelledby="Input" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalInputLabel">Input Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/pelayanan/store" method="POST">
                    @csrf
                    <input type="hidden" value="{{ auth()->user()->user_id }}" name="user_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <input type="text" class="form-control" id="diagnosa" name="diagnosa">
                        </div>
                        <div class="mb-3">
                            <label for="terapi" class="form-label">Terapi</label>
                            <select class="form-select" name="terapi[]" id="terapi" multiple>
                                @foreach ($terapis as $terapi)   
                                    <option value="{{ $terapi->id }}">{{ $terapi->nama_terapi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        new MultiSelectTag('terapi', {
            placeholder: 'Tambah Terapi'
        })  // id
    </script>
@endsection
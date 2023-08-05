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
                                <td>
                                    @foreach ($pendaftaran->terapi as $terapi)
                                        <ul>
                                            <li>{{ $terapi->nama_terapi }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($pendaftaran->obat as $obat)
                                        <ul>
                                            <li>{{ $obat->nama_obat}}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $pendaftaran->user->nama }}</td>
                                <td><button class="btn btn-success" data-bs-toggle="modal" id="buttonModal" data-bs-target="#modalInput" data-id="{{ $pendaftaran->id }}">Input</button></td>
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
                <form action="/pelayanan/store/" method="POST" id="formId">
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
                        <div class="mb-3">
                            <label for="obat" class="form-label">Obat Herbal</label>
                            <select class="form-select" name="obat[]" id="obat" multiple>
                                @foreach ($obats as $obat)   
                                    <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
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
        new MultiSelectTag('obat', {
            placeholder: 'Tambah Obat Herbal'
        })  // id

        const buttonModal = document.querySelectorAll('#buttonModal');
        buttonModal.forEach(element => {
            element.addEventListener('click', function(){
                const id = this.dataset.id;
                const form = document.getElementById('formId');
                // Get the current action attribute value
                let currentAction = form.getAttribute('action');
                // Append the data-id value to the current action value
                const newAction = `${currentAction}${id}`;
                // Set the updated action attribute on the form element
                form.setAttribute('action', newAction);
            });
        });
    </script>
@endsection
@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <h1>Halaman Data Pasien</h1>
    <div class="row mt-5">
        <div class="col-md-6">
            <a href="/dashboard/data-pasien/create" class="btn btn-primary">Tambah Pasien</a>
        </div>
    </div>
    @if (session('success'))    
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
    @endif
    
    <div class="d-flex justify-content-center mt-2">
        {{ $pasiens->links() }}
    </div>    
    <div class="row">
        <div class="table-responsive table-bordered col-md-12 ml-auto mr-auto">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Usia</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasiens as $pasien )
                    <tr>
                        <td>{{ $loop->iteration + $pasiens->firstItem() - 1 }}</td>
                        <td>{{ $pasien->nama_pasien }}</td>
                        <td>{{ $pasien->alamat }}</td>
                        <td>{{ $pasien->usia }}</td>
                        <td>{{ $pasien->jenis_kelamin }}</td>
                        <td>
                            <button class="badge text-bg-success border-0 tombolDetail"
                                data-bs-toggle="modal"
                                data-bs-target="#detailModal"
                                data-nama="{{ $pasien->nama_pasien }}"
                                data-alamat="{{ $pasien->alamat }}"
                                data-usia="{{ $pasien->usia }}"
                                data-agama="{{ $pasien->agama }}"
                                data-jeniskelamin="{{ $pasien->jenis_kelamin }}"
                                data-pekerjaan="{{ $pasien->pekerjaan }}"
                            >detail</button> / 
                            <a href="/dashboard/data-pasien/{{ $pasien->id }}/edit"><span class="badge text-bg-warning">ubah</span></a> / 
                            <form action="/dashboard/data-pasien/{{ $pasien->id }}" method="post" class="d-inline">@method('delete') @csrf <button class="badge text-bg-danger border-0" type="submit">hapus</button></form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $pasiens->links() }}
    </div>
    
    

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="lihatDetailLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="lihatDetailLabel">Detail Pasien</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <table>
                    <tbody>
                        <td>Nama</td>
                        <td id="modal-nama"></td>
                    </tbody>
                    <tbody>
                        <td>Alamat</td>
                        <td id="modal-alamat"></td>
                    </tbody>
                    <tbody>
                        <td>Usia</td>
                        <td id="modal-usia"></td>
                    </tbody>
                    <tbody>
                        <td>Agama</td>
                        <td id="modal-agama"></td>
                    </tbody>
                    <tbody>
                        <td>Jenis Kelamin</td>
                        <td id="modal-jeniskelamin"></td>
                    </tbody>
                    <tbody>
                        <td>Pekerjaan</td>
                        <td id="modal-pekerjaan"></td>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>    

<script>
    const buttons = document.querySelectorAll('.tombolDetail');
  const modalNama = document.getElementById('modal-nama');
  const modalAlamat = document.getElementById('modal-alamat');
  const modalUsia = document.getElementById('modal-usia');
  const modalAgama = document.getElementById('modal-agama');
  const modalJenisKelamin = document.getElementById('modal-jeniskelamin');
  const modalPekerjaan = document.getElementById('modal-pekerjaan');

  buttons.forEach(button => {
    button.addEventListener('click', function() {
      const nama = this.getAttribute('data-nama');
      const alamat = this.getAttribute('data-alamat');
      const usia = this.getAttribute('data-usia');
      const agama = this.getAttribute('data-agama');
      const jenisKelamin = this.getAttribute('data-jeniskelamin');
      const pekerjaan = this.getAttribute('data-pekerjaan');

      modalNama.textContent = nama;
      modalAlamat.textContent = alamat;
      modalUsia.textContent = usia;
      modalAgama.textContent = agama;
      modalJenisKelamin.textContent = jenisKelamin;
      modalPekerjaan.textContent = pekerjaan;
    });
  });
</script>
@endsection
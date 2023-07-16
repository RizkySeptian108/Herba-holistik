@extends('dashboard.layout.main')

@section('container')
    <h1>Edit Pasien</h1>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="container">
                
                <form action="/dashboard/data-pasien/{{ $pasien->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3 row">
                        <label for="nama_pasien" class="col-4 col-form-label ">Nama Pasien</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" name="nama_pasien" id="nama_pasien" value="{{ old('nama_pasien', $pasien->nama_pasien) }}">
                            @error('nama_pasien') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat', $pasien->alamat) }}">
                            @error('alamat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="usia" class="col-4 col-form-label">Usia</label>
                        <div class="col-8">
                            <input type="number" class="form-control @error('usia') is-invalid @enderror" name="usia" id="usia" value="{{ old('usia', $pasien->usia) }}">
                            @error('usia') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="agama" class="col-4 col-form-label">Agama</label>
                        <div class="col-8">
                            <select class="form-select" name="agama">
                                @foreach(['Islam', 'Kristen', 'Buddha', 'Hindu', 'Kong Hu Chu', 'Kepercayaan'] as $option)
                                    <option value="{{ $option }}" {{ old('agama', $pasien->agama) === $option ? 'selected' : '' }}>{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                    
                    <div class="mb-3 row">
                        <label class="col-4 col-form-label">Jenis Kelamin</label>
                        <div class="col-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" {{ old('jenis_kelamin', $pasien->jenis_kelamin) === 'Laki-laki'? 'checked' : ''  }}>
                                <label class="form-check-label" for="laki-laki">Laki-laki</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ old('jenis_kelamin', $pasien->jenis_kelamin) === 'Perempuan'? 'checked' : ''  }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            @error('jenis_kelamin')<div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pekerjaan" class="col-4 col-form-label">pekerjaan</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $pasien->jenis_kelamin) }}">
                            @error('pekerjaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
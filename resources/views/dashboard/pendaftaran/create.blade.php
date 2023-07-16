@extends('dashboard.layout.main')

@section('container')
    <h1>Tambah Pendaftaran</h1>

    
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="container">
                
                <form action="/dashboard/pendaftaran" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="pasien_id" class="col-4 col-form-label ">Nama Pasien</label>
                        <div class="col-8">
                            <select class="form-select @error('pasien_id') is-invalid @enderror" name="pasien_id" id="pasien_id">
                                <option value="">--Masukan Nama Pasien--</option>
                                @foreach($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}" {{ old('pasien_id') === $pasien->id ? 'selected' : '' }}>{{ $pasien->nama_pasien }}</option>
                                @endforeach
                            </select>
                            @error('pasien_id') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                    </div>    
                    <div class="mb-3 row">
                        <label for="berat_badan" class="col-4 col-form-label">Berat Badan (dlm Kg.)</label>
                        <div class="col-8">
                            <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" id="berat_badan" value="{{ old('berat_badan') }}" min="0">
                            @error('berat_badan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keluhan" class="col-4 col-form-label">Keluhan</label>
                        <div class="col-8">
                            <input type="text" class="form-control @error('keluhan') is-invalid @enderror" name="keluhan" id="keluhan" value="{{ old('keluhan') }}">
                            @error('keluhan') <div class="invalid-feedback">{{ $message }}</div> @enderror
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

    <script>
    
        $(document).ready(function() {
            $('#pasien_id').select2();
        });
    </script>

@endsection
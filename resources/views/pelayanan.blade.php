@extends('layout.main')

@include('layout.navbar')

@section('container')
    <div class="container my-2 ">
        <h1 class="m-2 text-center">Daftar Pasien</h1>
        <div class="row ">
            <form action="/pelayanan" class="d-flex justify-content-between" method="get">
            <div class="col-sm-3 d-flex">
                <input type="date" name="date" id="dateKey" class="form-control me-2">
            </div>
            <div class="col-sm-3 d-flex">
                <input type="text" name="keyword" id="keyword" class="form-control me-2" placeholder="Cari nama">
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
                    <tbody id="dataYouSearch">
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
    
    <script>
        const date = document.getElementById('dateKey');
        const keyword = document.getElementById('keyword');
        const containerForData = document.querySelector('#dataYouSearch');

        // for live search Date time
        date.addEventListener('change', function(){
            const dateTime = this.value;
            fetch(`/pelayanan/search?date_time=${dateTime}`)
                .then(response => {
                    if(!response.ok){
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    containerForData.innerHTML = '';
                    if(data.length === 0){
                        const element = '<tr class=""><td colspan="9999" class="text-center">No result!</td></tr>';
                        containerForData.innerHTML = element;
                    }else{
                        containerForData.innerHTML = data.map((pendaftaran, index) => 
                            `<tr class="">
                                    <td scope="row">${index + 1}</td>
                                    <td>${pendaftaran.pasien.nama_pasien}</td>
                                    <td>${pendaftaran.berat_badan}</td>
                                    <td>${pendaftaran.keluhan}</td>
                                    <td>${pendaftaran.status}</td>
                                    <td>${pendaftaran.created_at}</td>
                                    <td><a href="/pelayanan/periksa/${pendaftaran.pasien_id }" class="btn btn-primary">Periksa</a></td>
                            </tr>`
                        ).join('');
                    } 
                });
        });

        keyword.addEventListener('change', function(){
            const keyword = this.value;
            fetch(`/pelayanan/search?keyword=${keyword}`)
                .then(response => {
                    if(!response.ok){
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data =>{
                    containerForData.innerHTML = '';
                    if(data.length === 0){
                        containerForData.innerHTML = '<tr class=""><td colspan="9999" class="text-center">No result!</td></tr>';
                    }else{
                        containerForData.innerHTML = data.map((pendaftaran, index) => 
                            `<tr class="">
                                    <td scope="row">${index + 1}</td>
                                    <td>${pendaftaran.pasien.nama_pasien}</td>
                                    <td>${pendaftaran.berat_badan}</td>
                                    <td>${pendaftaran.keluhan}</td>
                                    <td>${pendaftaran.status}</td>
                                    <td>${pendaftaran.created_at}</td>
                                    <td><a href="/pelayanan/periksa/${pendaftaran.pasien_id }" class="btn btn-primary">Periksa</a></td>
                            </tr>`
                        ).join('');
                    }
                });
        });
    </script>
  
@endsection


@extends('layout.main')

@include('layout.navbar')

@section('container')
    <div class="container my-2 ">
        <h1 class="m-2 text-center">Daftar Pasien</h1>
        <div class="row justify-content-between">
            <div class="col-sm-2">
                <form action="/pelayanan" method="get">
                    <input type="date" name="date" id="date" class="form-control">
                </form>    
            </div>
            <div class="col-sm-3">
                <form action="">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search">
                </form>    
            </div>    
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
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
<!-- Place this script at the bottom of your view, just before the closing body tag -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const dateInput = document.getElementById('date');
      const dateForm = document.getElementById('dateForm');
  
      dateInput.addEventListener('change', function() {
        const selectedDate = dateInput.value;
  
        // Make the fetch request with the selected date as a query parameter
        fetch(`/pelayanan?date=${selectedDate}`)
          .then(function(response) {
            if (response.ok) {
              return response.json();
            } else {
              throw new Error('Request failed. Status:', response.status);
            }
          })
          .then(function(data) {
            // Update the table data with the received data
            const tableBody = document.querySelector('tbody');
            tableBody.innerHTML = ''; // Clear the table body
  
            data.forEach(function(pendaftaran, index) {
              const row = `
                <tr>
                  <td scope="row">${index + 1}</td>
                  <td>${pendaftaran.pasien.nama_pasien}</td>
                  <td>${pendaftaran.berat_badan}</td>
                  <td>${pendaftaran.keluhan}</td>
                  <td>${pendaftaran.status}</td>
                  <td>${pendaftaran.created_at}</td>
                  <td></td>
                </tr>
              `;
              tableBody.innerHTML += row;
            });
          })
          .catch(function(error) {
            console.log(error);
          });
      });
    });
  </script>
  
@endsection


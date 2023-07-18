@extends('layout.main')

@include('layout.navbar')

@section('container')

    <div class="container my-2 ">
        <h1 class="m-2 text-center">Daftar Pasien</h1>
        <div class="row justify-content-between">
            <div class="col-sm-2">
                <form action="">
                    <input type="date" name="" id="" class="form-control">    
                </form>    
            </div>
            <div class="col-sm-3">
                <form action="">
                    <input type="text" name="" id="" class="form-control" placeholder="Search">
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
                        <tr class="">
                            <td scope="row"></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection


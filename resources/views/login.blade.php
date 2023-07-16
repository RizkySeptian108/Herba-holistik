@extends('layout.main')

@section('container')

<main class="container-fluid ">
    <div class="row  justify-content-center align-items-center vh-100">
        <div class="col-sm-4 text-center">
          @if (session('login'))
          <div class="alert alert-danger" role="alert">
            {{ session('login') }}
          </div>
          @endif
            <form action="/login" method="post">
                @csrf
              <h1 class="h3 mb-3 fw-normal">Login</h1>
          
              <div class="form-floating mb-3">
                <input type="texts" name="username" class="form-control" id="username" placeholder="Masukan Username">
                <label for="username">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
            </form>
        </div>
    </div>
</main>
color
@endsection

    
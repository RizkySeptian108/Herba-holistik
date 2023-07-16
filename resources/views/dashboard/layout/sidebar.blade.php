<nav class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark vh-100 sticky-top">
    <a href="/dashboard" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4"><i class="bi bi-clipboard2-pulse-fill"></i> Herbal Holistik</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page">
            <i class="bi bi-person-circle mr-3"></i>
            Akun
        </a>
      </li>
      <li>
        <a href="/dashboard/pendaftaran" class="nav-link {{ Request::is('dashboard/pendaftaran*') ? 'active' : '' }}">
            <i class="bi bi-file-earmark-diff"></i>
            Pendaftaran
        </a>
      </li>
      <li>
        <a href="/dashboard/data-pasien" class="nav-link {{ Request::is('dashboard/data-pasien*') ? 'active' : '' }}">
            <i class="bi bi-person-fill-dash"></i>
            Data Pasien
        </a>
      </li>
      <li>
        <a href="/dashboard/terapi" class="nav-link {{ Request::is('dashboard/terapi*') ? 'active' : '' }}">
            <i class="bi bi-yin-yang"></i>
            Tindakan Terapi
        </a>
      </li>
      <li>
        <a href="/dashboard/obat-herbal" class="nav-link {{ Request::is('dashboard/obat-herbal*') ? 'active' : '' }}">
            <i class="bi bi-prescription2"></i>
            Obat Herbal
        </a>
      </li>
      <li>
        <a href="/dashboard/penterapi" class="nav-link {{ Request::is('dashboard/penterapi*') ? 'active' : '' }}">
            <i class="bi bi-person-fill-add"></i>
            Penterapi
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        @if (auth()->user()->foto === null)
        <img src="/img/default.png" alt="foto" width="32" height="32" class="rounded-circle me-2">
        @else
          <img src="{{ auth()->user()->foto }}" alt="foto" width="32" height="32" class="rounded-circle me-2">
        @endif
        <strong>{{ auth()->user()->nama }}</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <form action="/logout" method="post">
          @csrf
          <li><button class="dropdown-item" type="submit">Logout</button></li>
        </form>
      </ul>
    </div>
  </nav>
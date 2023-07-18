<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark" >
    <div class="container">   
      <a class="navbar-brand " href="#"><i class="bi bi-heart-pulse-fill me-2"></i>Herbal Holistik</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="/pelayanan">Home</a>
          <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->nama }}
            </a>
            <ul class="dropdown-menu" data-bs-theme="light">
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-left me-2"></i>Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </div>
      </div>
    </div>
</nav>
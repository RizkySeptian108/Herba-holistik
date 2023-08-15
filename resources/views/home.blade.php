<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $head }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/percobaan.css">

</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="img/percobaan/herbal-logo.png" alt="">
        </div>
        <ul class="navigation">
            <li><a href="">Home</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="#pelayanan">Layanan</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>

        <!-- Hamburger menu icon -->
        <div class="hamburger-menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </nav>
    <main class="container">
        <h1>Mencapai Sehat Dengan Pengobatan Thibunnabawi</h1>
        <div class="poster">
        </div>

        <!-- Layanan -->
        <h2 id="pelayanan">Pelayanan</h2>
        <div class="layanan">
            <div class="card-container">
                <h3>Obat Herbal</h3>
                @foreach ($obats as $obat)
                    <div class="card-layanan">
                        @if (!$obat->gambar)
                            <img src="/img/percobaan/madu.jpg" alt="">
                        @else
                            <img src="{{ asset('storage/'. $obat->gambar) }}" alt="">
                        @endif
                        <div class="">
                            <p>{{ $obat->nama_obat }}</p>
                            <p>{{ $obat->harga }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card-container">
                <h3>Terapi</h3>
                @foreach ($terapis as $terapi)
                    <div class="card-layanan">
                        @if (!$terapi->gambar)
                            <img src="/img/percobaan/madu.jpg" alt="">
                        @else
                            <img src="{{ asset('storage/'. $terapi->gambar) }}" alt="">  
                        @endif
                        <div class="">
                            <p>{{ $terapi->nama_terapi }}</p>
                            <p>{{ $terapi->harga }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tentang Kami -->

        <h2 id="tentang">Tentang Kami</h2>
        <p class="tentang-p">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus ea perspiciatis eius unde voluptates voluptatum perferendis et quaerat corporis quis commodi nisi, quisquam fuga nesciunt ipsum eaque! Quibusdam fugiat alias modi quam quos, debitis culpa laudantium accusamus. Eveniet amet at error temporibus vitae fuga dolor perferendis dolorum? Modi sapiente reprehenderit, similique ex commodi non veniam? Perspiciatis debitis at nihil odit, dolore optio rerum, repudiandae accusamus minima laborum fugiat nemo. Alias delectus numquam, voluptatibus sapiente accusamus totam culpa adipisci ipsum ad maiores placeat aliquid doloremque nisi dolorum impedit facere autem ab! Hic, impedit consequuntur accusantium nulla rem voluptatum magni perspiciatis fugit.</p>

        <!-- Kontak -->
        <section class="contact" id="kontak">
            <h2>Kontak Kami</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, vel?</p>	
    
            <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2355.3668071667985!2d106.78524581447856!3d-6.861933849531185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTEnNDIuMCJTIDEwNsKwNDcnMTMuNyJF!5e0!3m2!1sid!2sid!4v1680083045260!5m2!1sid!2sid"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
                
    
                <form action="">
                    <div class="input-group">
                        <i data-feather="user"></i>
                        <input type="text" placeholder="nama">
                    </div>
                    <div class="input-group">
                        <i data-feather="mail"></i>
                        <input type="text" placeholder="e-mail">
                    </div>
                    <div class="input-group">
                        <i data-feather="phone"></i>
                        <input type="text" placeholder="no hp">
                    </div>
                    <div class="tombol">
                        <button type="submit" class="btn">Kirim</button>
                    </div>
                </form>
    
            </div>	
        </section>
    </main>

    <footer>
        <div class="social-media">
            <a href=""><i data-feather="instagram"></i></a>
            <a href=""><i data-feather="twitter"></i></a>
            <a href=""><i data-feather="facebook"></i></a>
        </div>
        <div class="credit">
            <p>Created by <a href="">rizkyseptian</a>. | &copy; 2023.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <script src="js/percobaan.js"></script>
    
    
</body>
</html>
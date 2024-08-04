<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="/">
                    <img src="{{ asset('storage/' . $logo->logo) }}" alt="Logo">
                </a></h1>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil Desa</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/wilayah">Wilayah</a></li>
                        <li><a href="/sejarah">Sejarah</a></li>
                        <li><a href="/visi-misi">Visi & Misi</a></li>
                        <li><a href="/perangkat-desa">Perangkat Desa</a></li>
                        <li><a href="/peta-desa">Peta Desa</a></li>
                        <li><a href="/data-desa">Data Desa</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/pengumuman">Pengumuman</a></li>
                        <li><a href="/berita">Berita</a></li>
                        <li><a href="/gallery">Gallery</a></li>
                        <li><a href="/apbdesa">APBDesa</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="/umkm">Umkm</a></li>
                <li><a class="nav-link scrollto" href="/layanan">Layanan</a></li>
                <li><a class="nav-link scrollto" href="/kontak">Kontak kami</a></li>
                <li>
                    <a href="/login" class="nav-link scrollto">Masuk</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img my-2">
                <img src="{{ asset('storage/' . $logo->logo) }}" alt="Logo" width="200">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Tampilan</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/slider " aria-expanded="false">
                        <span>
                            <i class="ti ti-photo-minus"></i>
                        </span>
                        <span class="hide-menu">Slider</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/video-profile " aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-youtube"></i>
                        </span>
                        <span class="hide-menu">Video Profile</span>
                    </a>
                </li>


                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Publikasi</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-world-upload"></i>
                        </span>
                        <span class="hide-menu">Profil Desa</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/wilayah" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Wilayah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/sejarah" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Sejarah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/visi-misi" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Visi & misi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/perangkat-desa" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Perangkat Desa</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/peta-desa" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Peta Desa</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-edit"></i>
                        </span>
                        <span class="hide-menu">Berita</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/berita" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Daftar Berita</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/komentar" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Komentar</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/kategori" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Kategori</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-chart-bar"></i>
                        </span>
                        <span class="hide-menu">Data Desa</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/agama" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Agama</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/jenis-kelamin" aria-expanded="false">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Jenis Kelamin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="/admin/pekerjaan" class="sidebar-link">
                                <div class="round-16 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-point"></i>
                                </div>
                                <span class="hide-menu">Pekerjaan</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                        <span class="d-flex">
                            <i class="ti ti-info-circle"></i>
                        </span>
                        <span class="hide-menu">Informasi</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/umkm " aria-expanded="false">
                                <span>
                                    <i class="ti ti-point"></i>
                                </span>
                                <span class="hide-menu">Umkm Desa</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/layanan " aria-expanded="false">
                                <span>
                                    <i class="ti ti-point"></i>
                                </span>
                                <span class="hide-menu">Layanan</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/gallery " aria-expanded="false">
                                <span>
                                    <i class="ti ti-point"></i>
                                </span>
                                <span class="hide-menu">Gallery</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/pengumuman " aria-expanded="false">
                                <span>
                                    <i class="ti ti-point"></i>
                                </span>
                                <span class="hide-menu">Pengumuman</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/admin/apbdes " aria-expanded="false">
                                <span>
                                    <i class="ti ti-point"></i>
                                </span>
                                <span class="hide-menu">ApbDES</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="/admin/kontak " aria-expanded="false">
                        <span>
                            <i class="ti ti-mail-forward"></i>
                        </span>
                        <span class="hide-menu">Kontak</span>
                    </a>
                </li>

                <ul id="sidebarnav">
                    <li class="nav-small-cap">
                        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                        <span class="hide-menu">Pengaturan</span>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/identitas-situs " aria-expanded="false">
                            <span>
                                <i class="ti ti-brand-laravel"></i>
                            </span>
                            <span class="hide-menu">Identitas Situs</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="/admin/profil " aria-expanded="false">
                            <span>
                                <i class="ti ti-user"></i>
                            </span>
                            <span class="hide-menu">Profil</span>
                        </a>
                    </li>

                </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

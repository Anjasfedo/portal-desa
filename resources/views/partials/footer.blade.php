<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 footer-info">
            <img src="{{ asset('storage/' . $logo->logo) }}" class="mb-2" alt="Logo" width="250">
            <h3>{{ $nm_desa }}</h3>
            <p>
              Kecamatan {{ $kecamatan }}, Kabupaten {{ $kabupaten }}, <br> Provinsi {{ $provinsi }}, Kode Pos {{ $kode_pos }}<br><br>
              <strong>Nomor HP :</strong> {{ $no_hp }}<br>
              <strong>Email :</strong> {{ $email }}<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Menu</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/berita">Berita</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/umkm">Umkm</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/data-desa">Data Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/kontak">Kontak Kami</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Profil Desa</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/wilayah">Wilayah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/sejarah">Sejarah</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/visi-misi">Visi & Misi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/perangkat-desa">Perangkat Desa</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="/peta-desa">Peta Desa</a></li>
            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>2023</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->
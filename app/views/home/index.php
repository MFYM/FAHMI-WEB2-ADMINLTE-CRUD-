<div class="content-wrapper">
  <div class="content">
    <div class="container-fluid">
      <!-- Welcome Section -->
      <div class="row">
        <div class="col-12 text-center my-4">
          <h1>Selamat Datang di Dashboard Saya</h1>
          <p class="lead">Di sini Anda dapat mengelola berbagai data</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="card-header bg-primary text-white">
              <h3 class="card-title">Statistik Produk</h3>
            </div>
            <div class="card-body">
              <p><strong>Total Produk:</strong> 150</p>
              <p><strong>Produk Terjual:</strong> 75</p>
              <p><strong>Produk Tersedia:</strong> 75</p>
            </div>
            <div class="card-footer text-right">
              <a href="<?= BASEURL; ?>/Produk" class="btn btn-primary">Lihat Detail</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="card-header bg-success text-white">
              <h3 class="card-title">Statistik Pelanggan</h3>
            </div>
            <div class="card-body">
              <p><strong>Total Pelanggan:</strong> 200</p>
              <p><strong>Pelanggan Aktif:</strong> 150</p>
            </div>
            <div class="card-footer text-right">
              <a href="<?= BASEURL; ?>/Pelanggan" class="btn btn-success">Lihat Detail</a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card">
            <div class="card-header bg-warning text-white">
              <h3 class="card-title">Statistik Transaksi</h3>
            </div>
            <div class="card-body">
              <p><strong>Total Transaksi:</strong> 100</p>
              <p><strong>Total Pendapatan:</strong> Rp 2.000.000</p>
            </div>
            <div class="card-footer text-right">
              <a href="<?= BASEURL; ?>/Transaksi" class="btn btn-warning">Lihat Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
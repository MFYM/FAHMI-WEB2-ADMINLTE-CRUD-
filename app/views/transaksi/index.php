<div class="container">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/Home ">Home</a></li>
              <li class="breadcrumb-item active">Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <h1 class="mt-2">Transaksi</h1>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Tambah Transaksi
    </button>
    <br> <br>
    <div>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th scope="col">Nomor Transaksi</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Pembeli</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + ($data['currentPage'] - 1) * 10; ?>
                <?php foreach ($data['transaksi'] as $transaksi) : ?>
                <tr>
                    <td><?= htmlspecialchars($transaksi['id_transaksi']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($transaksi['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($transaksi['tanggal']); ?></td>
                    <td><?= htmlspecialchars($transaksi['total_harga']); ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/transaksi/detail/<?= $transaksi['id_transaksi']; ?>" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i> Detail Invoice
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>    
        </table>
    </div>
    <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $data['totalPages']; $i++) : ?>
                    <li class="page-item <?= $i == $data['currentPage'] ? 'active' : ''; ?>">
                        <a class="page-link" href="<?= BASEURL; ?>/transaksi/index/<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
    </nav>
</div>
</div>

<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Transaksi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            
        <div class="modal-body">
            <form action="<?= BASEURL; ?>/transaksi/Tambah" method="post" enctype="multipart/form-data"> 
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="ID Pelanggan" required>
            </div>
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
            </div>
            <div class="mb-3">
                <label for="kode_barang" class="form-label">kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Kode Barang" required>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah Barang</label> 
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" required>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            
            </div>
            </form>
        </div>
  </div>
</div>



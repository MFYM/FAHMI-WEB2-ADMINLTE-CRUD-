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
              <li class="breadcrumb-item active">Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <h1 class="mt-2">Produk</h1>
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary" id="tambahProdukButton">
        Tambah Data Produk
    </button>
    <br><br>
    <div>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 + ($data['currentPage'] - 1) * 10; ?>
                <?php $no = 1; ?>
                <?php foreach ($data['produk'] as $produk) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= htmlspecialchars($produk['nama_barang']); ?></td>
                    <td><?= htmlspecialchars($produk['harga']); ?></td>
                    <td><?= htmlspecialchars($produk['stok']); ?></td>
                    <td>
                    <button class="btn btn-primary btn-sm btn-detail" 
                        data-toggle="modal" 
                        data-target="#modal-detail" 
                        data-kode_barang="<?= $produk['kode_barang']; ?>" 
                        data-nama_barang="<?= htmlspecialchars($produk['nama_barang']); ?>" 
                        data-harga="<?= htmlspecialchars($produk['harga']); ?>" 
                        data-stok="<?= htmlspecialchars($produk['stok']); ?>" 
                        data-deskripsi="<?= htmlspecialchars($produk['deskripsi']); ?>" 
                        data-foto_barang="<?= BASEURL; ?>/uploads/<?= htmlspecialchars($produk['foto_barang']); ?>">
                        <i class="fas fa-eye"></i> Detail
                    </button>

                        <button class="btn btn-info btn-sm editProdukButton" data-toggle="modal" data-target="#modal-secondary"
                                data-kode_barang="<?= $produk['kode_barang']; ?>"
                                data-nama_barang="<?= htmlspecialchars($produk['nama_barang']); ?>"
                                data-harga="<?= htmlspecialchars($produk['harga']); ?>"
                                data-stok="<?= htmlspecialchars($produk['stok']); ?>"
                                data-deskripsi="<?= htmlspecialchars($produk['deskripsi']); ?>"
                                data-foto_barang="<?= htmlspecialchars($produk['foto_barang']); ?>">
                            <i class="fas fa-pencil-alt"></i> Edit
                        </button>
                        
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
                        <a class="page-link" href="<?= BASEURL; ?>/produk/index/<?= $i; ?>"><?= $i; ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
    </nav>
</div>
</div>
<!-- Tambah dan Edit -->
<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title" id="modalTitle">Tambah Data Produk</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
                <form id="formProduk" action="<?= BASEURL; ?>/produk/Tambah" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="foto_barang" class="form-label">Foto Produk</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_barang" name="foto_barang">
                                <label class="custom-file-label" for="foto_barang">Choose file</label>
                            </div>
                        </div>
                        <small class="text-white" id="currentFoto"></small>
                    </div>
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="kode_barang" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="nama_barang">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga">
                    </div>
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light" id="modalSubmitButton">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Detail -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title" id="modalDetailTitle">Detail Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <img id="detailFotoBarang" class="img-fluid" src="" alt="Product Image">
                </div>
                <div class="mb-3">
                    <label class="form-label">Kode Produk</label>
                    <p id="detailKodeBarang" class="form-text"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <p id="detailNamaBarang" class="form-text"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <p id="detailHarga" class="form-text"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <p id="detailStok" class="form-text"></p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Barang</label>
                    <p id="detailDeskripsi" class="form-text"></p>
                </div>
            </div>
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
    const modalTitle = document.getElementById('modalTitle');
    const formProduk = document.getElementById('formProduk');
    const modalSubmitButton = document.getElementById('modalSubmitButton');
    const kodeBarangInput = document.getElementById('kode_barang');
    const namaBarangInput = document.getElementById('nama_barang');
    const hargaInput = document.getElementById('harga');
    const stokInput = document.getElementById('stok');
    const deskripsiInput = document.getElementById('deskripsi');
    const currentFoto = document.getElementById('currentFoto');

    // Edit Product
    document.querySelectorAll('.editProdukButton').forEach(button => {
        button.addEventListener('click', () => {
            modalTitle.textContent = 'Edit Data Produk';
            formProduk.action = `<?= BASEURL; ?>/produk/Edit/${button.getAttribute('data-kode_barang')}`;
            modalSubmitButton.textContent = 'Update';

            kodeBarangInput.value = button.getAttribute('data-kode_barang');
            namaBarangInput.value = button.getAttribute('data-nama_barang');
            hargaInput.value = button.getAttribute('data-harga');
            stokInput.value = button.getAttribute('data-stok');
            deskripsiInput.value = button.getAttribute('data-deskripsi');
            currentFoto.textContent = `Current file: ${button.getAttribute('data-foto_barang')}`;
            kodeBarangInput.readOnly = true;
        });
    });

    // Add Product
    document.getElementById('tambahProdukButton').addEventListener('click', () => {
        modalTitle.textContent = 'Tambah Data Produk';
        formProduk.action = `<?= BASEURL; ?>/produk/Tambah`;
        modalSubmitButton.textContent = 'Tambah';

        kodeBarangInput.value = '';
        namaBarangInput.value = '';
        hargaInput.value = '';
        stokInput.value = '';
        deskripsiInput.value = '';
        currentFoto.textContent = '';
        kodeBarangInput.readOnly = false;
    });

    // View Product Detail
    document.querySelectorAll('.btn-detail').forEach(button => {
    button.addEventListener('click', () => {
        // Ambil data dari tombol
        const imageUrl = button.getAttribute('data-foto_barang');
        const kodeBarang = button.getAttribute('data-kode_barang');
        const namaBarang = button.getAttribute('data-nama_barang');
        const harga = button.getAttribute('data-harga');
        const stok = button.getAttribute('data-stok');
        const deskripsi = button.getAttribute('data-deskripsi');

        // Atur data ke elemen modal
        document.getElementById('detailKodeBarang').textContent = kodeBarang;
        document.getElementById('detailNamaBarang').textContent = namaBarang;
        document.getElementById('detailHarga').textContent = `Rp ${harga}`;
        document.getElementById('detailStok').textContent = stok;
        document.getElementById('detailDeskripsi').textContent = deskripsi;

        // Atur gambar produk di modal
        const imgElement = document.getElementById('detailFotoBarang');
        imgElement.src = imageUrl || "<?= BASEURL; ?>/uploads/default_image.jpg"; // Gambar default jika tidak ada
    });
});



});


</script>
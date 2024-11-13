<div class="content-wrapper">
<div class="container justify-cont">
    <div class="mt-8">
    <div class="card " style="width: 18rem;">
    <img src="<?= BASEURL; ?>/uploads/<?= htmlspecialchars($data['produk']['foto_barang']); ?>" alt="<?= htmlspecialchars($data['produk']['nama_barang']); ?>">
        <div class="card-body">
            <h5 class="card-title"><?= $data['produk']['nama_barang']; ?></h5>
            <p class="card-text"><?= $data['produk']['deskripsi']; ?></p>
            <p class="card-text">Stok = <?= $data['produk']['stok']; ?></p>
            <a href="<?= BASEURL; ?>/produk" class="btn btn-primary">Kembali</a>
        </div>
    </div>
    </div>
</div>
</div>
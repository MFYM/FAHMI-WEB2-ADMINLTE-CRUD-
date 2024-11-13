<div class="content-wrapper">
<div class="container mt-2 pb-4">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['transaksi']['nama_barang']; ?></h5>
            <p class="card-text">Nomor Transaksi = <?= $data['transaksi']['id_transaksi']; ?></p>
            <p class="card-text">Kode Barang = <?= $data['transaksi']['kode_barang']; ?></p>
            <p class="card-text">ID Pelanggan = <?= $data['transaksi']['id_pelanggan']; ?></p>
            <p class="card-text">Nama Pelanggan = <?= $data['transaksi']['nama_pelanggan']; ?></p>
            <p class="card-text">Jumlah = <?= $data['transaksi']['jumlah']; ?></p>
            <p class="card-text">Total Harga = <?= $data['transaksi']['total_harga']; ?></p>
            <p class="card-text">Tanggal = <?= $data['transaksi']['tanggal']; ?></p>
            <a href="<?= BASEURL; ?>/transaksi" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
</div>
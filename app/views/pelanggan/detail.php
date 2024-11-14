<div class="content-wrapper">
        <div class="container mt-5 pb-8">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Nama Saya <strong><?= $data['pelanggan']['nama_pelanggan']; ?></strong></h5>
                    <p class="card-text">Alamat saya di <strong><?= $data['pelanggan']['alamat']; ?></strong></p>
                    <p class="card-text">ID = <strong><?= $data['pelanggan']['id_pelanggan']; ?></strong></p>
                    <a href="<?= BASEURL; ?>/pelanggan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/produk/Edit/<?= $data['produk']['kode_barang'] ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="foto_barang" class="form-label">Foto Produk</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto_barang" name="foto_barang">
                                <label class="custom-file-label" for="foto_barang">Choose file</label>
                            </div>
                        </div>
                        <small class="text-white">Current file: <?= $data['produk']['foto_barang'] ?></small>
                    </div>

                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?= $data['produk']['kode_barang'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $data['produk']['nama_barang'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['produk']['harga'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" value="<?= $data['produk']['stok'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Barang</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $data['produk']['deskripsi'] ?></textarea>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

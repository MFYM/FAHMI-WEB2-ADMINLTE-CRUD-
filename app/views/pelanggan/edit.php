<!-- Edit Button to Trigger Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-secondary">
    Edit Data Pelanggan
</button>

<!-- Modal HTML Structure -->
<div class="modal fade" id="modal-secondary">
    <div class="modal-dialog">
        <div class="modal-content bg-secondary">
            <div class="modal-header">
                <h4 class="modal-title" id="modalTitle">Edit Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form id="formPelanggan" action="<?= BASEURL; ?>/pelanggan/edit" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_pelanggan">ID Pelanggan</label>
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= $data['pelanggan']['id_pelanggan'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?= $data['pelanggan']['nama_pelanggan'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?= $data['pelanggan']['alamat'] ?></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

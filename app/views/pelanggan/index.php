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
              <li class="breadcrumb-item active">Pelanggan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <h1 class="mt-2">Pelanggan</h1> 
    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary" id="tambahPelangganButton">
        Tambah Data Pelanggan
    </button>
    <br> <br>
    <div>
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
              <?php $no = 1 + ($data['currentPage'] - 1) * 10; ?>
                <?php $no = 1  ; ?>
                <?php foreach ($data['pelanggan'] as $pelanggan) : ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= htmlspecialchars($pelanggan['nama_pelanggan']); ?></td>
                    <td><?= htmlspecialchars($pelanggan['alamat']); ?></td>
                    <td>
                        <a href="<?= BASEURL; ?>/pelanggan/detail/<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-info btn-sm"><i class="fas fa-eye">
                        </i> Detail</a>
                        <a href="<?= BASEURL; ?>/pelanggan/delete/<?= $pelanggan['id_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data pelanggan ini?')"><i class="fas fa-trash"></i> Delete</a>
                        <button class="btn btn-info btn-sm editPelangganButton" data-toggle="modal" data-target="#modal-secondary"
                                data-id_pelanggan="<?= $pelanggan['id_pelanggan']; ?>"
                                data-nama_pelanggan="<?= htmlspecialchars($pelanggan['nama_pelanggan']); ?>"
                                data-alamat="<?= htmlspecialchars($pelanggan['alamat']); ?>">
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
                        <a class="page-link" href="<?= BASEURL; ?>/pelanggan/index/<?= $i; ?>"><?= $i; ?></a>
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
                <h4 class="modal-title" id="modalTitle">Tambah Data Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form id="formPelanggan" action="<?= BASEURL; ?>/pelanggan/tambah" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_pelanggan">ID Pelanggan</label>
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Masukkan ID Pelanggan" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama_pelanggan">Nama Pelanggan</label>
                        <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Masukkan Nama Pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.editPelangganButton').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id_pelanggan');
            const nama = this.getAttribute('data-nama_pelanggan');
            const alamat = this.getAttribute('data-alamat');

            
            document.getElementById('modalTitle').innerText = 'Edit Data Pelanggan';
            document.getElementById('formPelanggan').action = '<?= BASEURL; ?>/pelanggan/edit/' + id;

            
            document.getElementById('id_pelanggan').value = id;
            document.getElementById('nama_pelanggan').value = nama;
            document.getElementById('alamat').value = alamat;
        });
    });

    // Reset modal for adding new data
    document.getElementById('tambahPelangganButton').addEventListener('click', function() {
        document.getElementById('modalTitle').innerText = 'Tambah Data Pelanggan';
        document.getElementById('formPelanggan').action = '<?= BASEURL; ?>/pelanggan/tambah';
        document.getElementById('id_pelanggan').value = '';
        document.getElementById('nama_pelanggan').value = '';
        document.getElementById('alamat').value = '';
    });
</script>
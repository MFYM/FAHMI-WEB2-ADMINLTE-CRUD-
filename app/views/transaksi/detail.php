<!-- <div class="content-wrapper">
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
</div> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/Home">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info no-print">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>

            <!-- Main content -->
            <div class="invoice p-3 mb-3 printable" id="invoice-content">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Fahmi, Inc.
                    <small class="float-right">Date: <?= htmlspecialchars($data['transaksi']['tanggal']); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Fahmi, Inc.</strong><br>
                    Indonesia, Jawa Tengah<br>
                    Medono, Kota Pekalongan<br>
                    Phone: 0857-1341-1586<br>
                    Email: fymuzhaffar@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?= htmlspecialchars($data['transaksi']['nama_pelanggan']); ?></strong><br>
                    <?= htmlspecialchars($data['transaksi']['alamat']); ?><br>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #<?= htmlspecialchars($data['transaksi']['id_transaksi']); ?></b><br>
                  <br>
                  <b>Payment Due:</b> <?= htmlspecialchars($data['transaksi']['tanggal']); ?><br>
                  <b>Account:</b> <?= htmlspecialchars($data['transaksi']['id_pelanggan']); ?>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>ID Product</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data['items']) && is_array($data['items'])): ?>
                            <?php foreach ($data['items'] as $data): ?>
                                <tr>
                                    <td><?= htmlspecialchars($data['jumlah']); ?></td>
                                    <td><?= htmlspecialchars($data['nama_barang']); ?></td>
                                    <td><?= htmlspecialchars($data['kode_barang']); ?></td>
                                    <td><?= htmlspecialchars($data['deskripsi']); ?></td>
                                    <td><?= htmlspecialchars($data['total_harga']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">Tidak ada item ditemukan untuk transaksi ini.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <div class="col-6">
                    <p class="lead">Payment Methods:</p>
                    <div class="payment-methods">
                        <img src="<?= BASEURL; ?>/AdminLTE/dist/img/credit/visa.png" alt="Visa" style="width: 50px; height: auto; margin-right: 5px;">
                        <img src="<?= BASEURL; ?>/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard" style="width: 50px; height: auto; margin-right: 5px;">
                        <img src="<?= BASEURL; ?>/AdminLTE/dist/img/credit/american-express.png" alt="American Express" style="width: 50px; height: auto; margin-right: 5px;">
                        <img src="<?= BASEURL; ?>/AdminLTE/dist/img/credit/paypal2.png" alt="Paypal" style="width: 50px; height: auto; margin-right: 5px;">
                    </div>
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Additional payment information can be provided here.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Amount Due <?= htmlspecialchars($data['tanggal']); ?></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td><?= htmlspecialchars($data['total_harga']); ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><?= htmlspecialchars($data['total_harga']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                    <div class="col-12">
                        <button rel="noopener" onclick="printInvoice()" class="btn btn-default"><i class="fas fa-print"></i> 
                            Print
                        </button>
                        
                        <a href="<?= BASEURL; ?>/Transaksi" type="button" class="btn btn-success float-right">
                            Kembali
                        </a>
                        <button type="button" rel="noopener" class="btn btn-primary float-right" onclick="pdf()" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                        </button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

<script>
    function printInvoice() {
        window.print();
    }

    function pdf() {
        const element = document.getElementById('invoice-content'); // Get the invoice content
        html2pdf()
            .from(element)
            .save('invoice.pdf'); // Specify the name of the PDF file
    }
</script>
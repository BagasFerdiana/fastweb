<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
          <?= $this->session->flashdata('message'); ?>
          <a href="<?= base_url('produk/data/add') ?>" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newProdukModal">Tambah Produk</a>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th scope="col">Kode</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Nama</th>
                      <th scope="col">Stok</th>
                      <th scope="col">Satuan</th>
                      <th scope="col">Harga Pokok</th>
                      <th scope="col">Eceran</th>
                      <th scope="col">Grosir</th>
                      <th scope="col" style="text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($produk as $p) :
                    $lp_id=$p['lp_id'];
                    $bar=$p['barcode'];
                    $kti=$p['kategori'];
                    $nama=$p['nama_pr'];
                    $stok=$p['stok'];
                    $satuan=$p['satuan'];
                    $harpok=$p['harga_pk'];
                    $eceran=$p['harga_ec'];
                    $grosir=$p['harga_gr'];
                    ?>
                  <tr>
                      <td><?= $bar; ?></td>
                      <td><?= $kti; ?></td>
                      <td><?= $nama; ?></td>
                      <td><?= $stok; ?></td>
                      <td><?= $satuan; ?></td>
                      <td style="text-align:right"><?= 'Rp. '.number_format($harpok); ?></td>
                      <td style="text-align:right"><?= 'Rp. '.number_format($eceran); ?></td>
                      <td style="text-align:right"><?= 'Rp. '.number_format($grosir); ?></td>
                      <td style="text-align:center">
                          <a href="<?= base_url('produk/data/edit/') . $p['lp_id']; ?>" class="badge badge-success" data-toggle="modal" data-target="#editProdukModal<?= $lp_id; ?>">edit</a>
                          <a href="<?= base_url('produk/data/delete/') . $p['lp_id']; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">delete</a>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newProdukModal" tabindex="-1" role="dialog" aria-labelledby="newProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProdukModalLabel">Add New Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/data'); ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $barcode; ?>" readonly>
                  <?= form_error('barcode', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                      <select class="form-control" id="kategori_id" name="kategori_id">
                          <option value="">Select Kategori</option>
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nama_pr" name="nama_pr" placeholder="Produk name">
                    <?= form_error('nama_pr', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="stok" name="stok" placeholder="Stok produk">
                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                        <select class="form-control" name="satuan">
                          <option value="">Select Satuan</option>
                            <option>Unit</option>
                            <option>Kotak</option>
                            <option>Botol</option>
                            <option>Butir</option>
                            <option>Buah</option>
                            <option>Biji</option>
                            <option>Sachet</option>
                            <option>Bks</option>
                            <option>Roll</option>
                            <option>PCS</option>
                            <option>Box</option>
                            <option>Meter</option>
                            <option>Centimeter</option>
                            <option>Liter</option>
                            <option>CC</option>
                            <option>Mililiter</option>
                            <option>Lusin</option>
                            <option>Gross</option>
                            <option>Kodi</option>
                            <option>Rim</option>
                            <option>Dozen</option>
                            <option>Kaleng</option>
                            <option>Lembar</option>
                            <option>Helai</option>
                            <option>Gram</option>
                            <option>Kilogram</option>
                      </select>
                      <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_pk" name="harga_pk" placeholder="Harga pokok">
                    <?= form_error('harga_pk', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_ec" name="harga_ec" placeholder="Harga eceran">
                    <?= form_error('harga_ec', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_gr" name="harga_gr" placeholder="Harga grosir">
                    <?= form_error('harga_gr', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal EDIT -->
<?php foreach ($produk as $p):
  $lp_id=$p['lp_id'];
  $bar=$p['barcode'];
  $kti=$p['kategori'];
  $nama=$p['nama_pr'];
  $stok=$p['stok'];
  $satuan=$p['satuan'];
  $harpok=$p['harga_pk'];
  $eceran=$p['harga_ec'];
  $grosir=$p['harga_gr'];
  ?>

<div class="modal fade" id="editProdukModal<?= $lp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editProdukModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProdukModalLabel">Edit Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/data/edit/') . $lp_id; ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="id" value="<?= $lp_id; ?>">
                  <input type="text" class="form-control" id="barcode" name="barcode" value="<?= $bar; ?>" readonly>
                  <?= form_error('barcode', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                      <select class="form-control" id="kategori_id" name="kategori_id">
                        <?php foreach ($kategori as $k) : ?>
                          <?php if( $k['kategori_id'] == $p['kategori_id'] ) : ?>
                            <option value="<?= $k['kategori_id']; ?>" selected><?= $k['kategori']; ?></option>
                            <?php else : ?>
                            <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('kategori_id', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="nama_pr" name="nama_pr" value="<?= $nama; ?>">
                    <?= form_error('nama_pr', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $stok; ?>">
                    <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                        <select class="form-control" id="satuan" name="satuan">
                          <option value="<?= $p['lp_id']; ?>"selected><?= $satuan; ?></option>
                            <option>Unit</option>
                            <option>Kotak</option>
                            <option>Botol</option>
                            <option>Butir</option>
                            <option>Buah</option>
                            <option>Biji</option>
                            <option>Sachet</option>
                            <option>Bks</option>
                            <option>Roll</option>
                            <option>PCS</option>
                            <option>Box</option>
                            <option>Meter</option>
                            <option>Centimeter</option>
                            <option>Liter</option>
                            <option>CC</option>
                            <option>Mililiter</option>
                            <option>Lusin</option>
                            <option>Gross</option>
                            <option>Kodi</option>
                            <option>Rim</option>
                            <option>Dozen</option>
                            <option>Kaleng</option>
                            <option>Lembar</option>
                            <option>Helai</option>
                            <option>Gram</option>
                            <option>Kilogram</option>
                      </select>
                      <?= form_error('satuan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_pk" name="harga_pk" value="<?= $harpok; ?>">
                    <?= form_error('harga_pk', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_ec" name="harga_ec" value="<?= $eceran; ?>">
                    <?= form_error('harga_ec', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="harga_gr" name="harga_gr" value="<?= $grosir; ?>">
                    <?= form_error('harga_gr', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>

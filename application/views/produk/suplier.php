<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
          <?= form_error('nama_suplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= form_error('alamat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= form_error('notelp', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSuplierModal">Tambah Suplier</a>
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
                      <th scope="col "style="text-align:center">No*</th>
                      <th scope="col">Suplier</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">No. Telp.</th>
                      <th scope="col" style="text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($suplier as $s) :
                    $s_id=$s['suplier_id'];
                    $sup=$s['nama_suplier'];
                    $alamat=$s['alamat'];
                    $notelp=$s['notelp'];
                    ?>
                  <tr>
                      <th scope="row" style="text-align:center"><?= $i; ?></th>
                      <td><?= $sup; ?></td>
                      <td><?= $alamat; ?></td>
                      <td><?= $notelp; ?></td>
                      <td style="text-align:center">
                          <a href="<?= base_url('produk/suplier/edit/') . $s_id; ?>" class="badge badge-success" data-toggle="modal" data-target="#editSuplierModal<?= $s_id; ?>">edit</a>
                          <a href="<?= base_url('produk/suplier/delete/') . $s_id; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">delete</a>
                      </td>
                  </tr>
                  <?php $i++; ?>
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

<!-- Modal -->
<div class="modal fade" id="newSuplierModal" tabindex="-1" role="dialog" aria-labelledby="newSuplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSuplierModalLabel">Add New Suplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/suplier'); ?>" method="post">
              <div class="modal-body">
                  <div class="form-group">
                    <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" placeholder="Suplier name">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Suplier">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="notelp" name="notelp" placeholder="No. telpon suplier">
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
<?php foreach ($suplier as $s):
    $s_id=$s['suplier_id'];
    $sup=$s['nama_suplier'];
    $alamat=$s['alamat'];
    $notelp=$s['notelp'];
  ?>

<div class="modal fade" id="editSuplierModal<?= $s_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editSuplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSuplierModalLabel">Edit Suplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/suplier/edit/') . $s_id; ?>" method="post">
              <div class="modal-body">
                  <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?= $s_id; ?>">
                    <input type="text" class="form-control" id="nama_suplier" name="nama_suplier" placeholder="Suplier name" value="<?= $sup; ?>">
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Suplier name" value="<?= $alamat; ?>">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" id="notelp" name="notelp" placeholder="Suplier name" value="<?= $notelp; ?>">
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

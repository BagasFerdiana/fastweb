<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
          <?= form_error('merek', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMerekModal">Tambah Merek</a>
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
                      <th scope="col">Kategori</th>
                      <th scope="col">Merek</th>
                      <th scope="col" style="text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($merek as $m) :
                    $m_id=$m['merek_id'];
                    $k_name=$m['kategori'];
                    $m_name=$m['merek'];
                    ?>
                  <tr>
                      <th scope="row" style="text-align:center"><?= $i; ?></th>
                      <td><?= $k_name; ?></td>
                      <td><?= $m_name; ?></td>
                      <td style="text-align:center">
                          <a href="<?= base_url('produk/merek/edit/') . $m_id; ?>" class="badge badge-success" data-toggle="modal" data-target="#editMerekModal<?= $m_id; ?>">edit</a>
                          <a href="<?= base_url('produk/merek/delete/') . $m_id; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">delete</a>
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
<div class="modal fade" id="newMerekModal" tabindex="-1" role="dialog" aria-labelledby="newMerekModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMerekModalLabel">Add New Merek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/merek'); ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <option value="">Select Menu</option>
                        <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="merek" name="merek" placeholder="Merek name">
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
<?php foreach ($merek as $m):
    $m_id=$m['merek_id'];
    $k_name=$m['kategori'];
    $m_name=$m['merek'];
  ?>

<div class="modal fade" id="editMerekModal<?= $m_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editMerekModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMerekModalLabel">Edit Merek</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('produk/merek/edit/') . $m_id; ?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                    <select name="kategori_id" id="kategori_id" class="form-control">
                        <?php foreach ($kategori as $k) : ?>
                          <?php if( $k['kategori_id'] == $m['kategori_id'] ) : ?>
                            <option value="<?= $k['kategori_id']; ?>" selected><?= $k['kategori']; ?></option>
                            <?php else : ?>
                            <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori']; ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                  <div class="form-group">
                    <input type="hidden" id="id" name="id" value="<?= $m_id; ?>">
                    <input type="text" class="form-control" id="merek" name="merek" placeholder="Merek name" value="<?= $m_name; ?>">
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

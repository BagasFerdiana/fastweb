<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7">
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu</a>
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
                      <th scope="col">Menu</th>
                      <th scope="col" style="text-align:center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) :
                    $m_id=$m['id'];
                    $isi=$m['menu'];
                    ?>
                  <tr>
                      <th scope="row" style="text-align:center"><?= $i; ?></th>
                      <td><?= $isi; ?></td>
                      <td style="text-align:center">
                          <a href="<?= base_url('menu/edit/') . $m_id; ?>" class="badge badge-success" data-toggle="modal" data-target="#editMenuModal<?= $m_id; ?>">edit</a>
                          <a href="<?= base_url('menu/delete/') . $m_id; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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
<?php foreach ($menu as $m):
    $m_id=$m['id'];
    $isi=$m['menu'];
  ?>

<div class="modal fade" id="editMenuModal<?= $m_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/edit/') . $m_id; ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                      <input type="hidden" id="id" name="id" value="<?= $m_id; ?>">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name" value="<?= $isi; ?>">
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

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Sub Menu</a>

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
                        <th scope="col" style="text-align:center">No*</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) :
                        $sm_id=$sm['id'];
                        $t_s=$sm['title'];
                        $m_s=$sm['menu'];
                        $u_s=$sm['url'];
                        $con_s=$sm['icon'];
                        $i_s=$sm['is_active'];
                      ?>
                    <tr>
                        <th scope="row" style="text-align:center"><?= $i; ?></th>
                        <td><?= $t_s; ?></td>
                        <td><?= $m_s; ?></td>
                        <td><?= $u_s; ?></td>
                        <td><?= $con_s; ?></td>
                        <td><?= $i_s; ?></td>
                        <td style="text-align:center">
                          <a href="<?= base_url('menu/edit_s/') . $sm_id; ?>" class="badge badge-success" data-toggle="modal" data-target="#editSubMenuModal<?= $sm_id; ?>">edit</a>
                          <a href="<?= base_url('menu/delete_s/') . $sm_id; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">delete</a>
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
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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
<!-- Modal Edit -->
<?php foreach ($subMenu as $sm) :
    $sm_id=$sm['id'];
    $t_s=$sm['title'];
    $m_s=$sm['menu'];
    $u_s=$sm['url'];
    $con_s=$sm['icon'];
    $i_s=$sm['is_active'];
  ?>
  <div class="modal fade" id="editSubMenuModal<?= $sm_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editSubMenuModalLabel">Edit Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="<?= base_url('menu/edit_s/') . $sm_id; ?>" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?= $sm_id; ?>">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title" value="<?= $t_s; ?>">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>
                              <?php if( $m['id'] == $sm['menu_id'] ) : ?>
                                <option value="<?= $m['id']; ?>" selected><?= $m['menu']; ?></option>
                                <?php else : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                              <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url" value="<?= $u_s; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon" value="<?= $con_s; ?>">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
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

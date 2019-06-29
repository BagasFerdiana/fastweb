<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Role : <?= $role['role']; ?></h6>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" style="text-align:center">No*</th>
                        <th scope="col">Role</th>
                        <th scope="col" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($menu as $m) : ?>
                    <tr>
                        <th scope="row" style="text-align:center"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td style="text-align:center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                            </div>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -- >

<!-- Begin Page Content -->
<div class="container-fluid">

    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
      </ol>
    </nav>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
      <form action="<?php echo base_url().'admin/pembelian/add_to_cart'?>" method="post">
          <table>
              <tr>
                  <th style="width:100px;padding-bottom:5px;">No Faktur</th>
                  <th style="width:300px;padding-bottom:5px;"><input type="text" name="nofak" class="form-control input-sm" value="<?php echo $this->session->userdata('nofak');?>" style="width:200px;" required></th>
                  <th style="width:70px;padding-bottom:5px;">Suplier</th>
                  <td style="width:615px;">
                  <select name="suplier" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Suplier" data-width="100%" required>
                    <?php foreach ($suplier as $i) {
                            $id_sup = $i['suplier_id'];
                            $nm_sup = $i['nama_suplier'];
                            $al_sup = $i['alamat'];
                            $notelp_sup = $i['notelp'];
                            $sess_id = $this->session->userdata('suplier');
                            if($sess_id == $id_sup)
                                echo "<option value='$id_sup' selected>$nm_sup - $al_sup - $notelp_sup</option>";
                            else
                                echo "<option value='$id_sup'>$nm_sup - $al_sup - $notelp_sup</option>";
                        }?>
                  </select>
                  </td>
              </tr>
              <tr>
                  <th>Tanggal</th>
                  <td>
                      <div class='input-group date' id='datepicker' style="width:200px;">
                          <input type='text' name="tgl" class="form-control" value="<?php echo $this->session->userdata('tglfak');?>" placeholder="Tanggal..." required/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                      </div>
                      <script type="text/javascript">
                          $(function () {
                            $('#datepicker').datetimepicker({
                                  format: 'YYYY-MM-DD',
                              });
                          });
                      </script>
                  </td>
              </tr>
          </table><hr/>
          <table>
          <tr>
              <th>Kode Barang</th>
          </tr>
          <tr>
              <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>
          </tr>
              <div id="detail_barang" style="position:absolute;">
              </div>
          </table>
    <hr>
    <table class="table table-bordered table-hover" style="font-size:11px;margin-top:10px;">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th style="text-align:center;">Satuan</th>
                    <th style="text-align:center;">Harga Pokok</th>
                    <th style="text-align:center;">Harga Jual</th>
                    <th style="text-align:center;">Jumlah Beli</th>
                    <th style="text-align:center;">Sub Total</th>
                    <th style="width:100px;text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <a href="<?php echo base_url().'produk/pembelian/simpan'?>" class="btn btn-info btn-lg"><span class="fa fa-save"></span> Simpan</a>
            </tfoot>
          </table>
        </form>
      </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

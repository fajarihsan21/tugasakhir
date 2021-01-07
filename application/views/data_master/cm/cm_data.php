
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <section class="content">
          <!-- Page Heading -->
          <h3 class="box-title"><?= $title;  ?></h3>
          <?= $this->session->flashdata('alert'); ?>
          <p class="mb-2"></p>
          <!-- DataTales Example -->
              <div class="pull-right">
            <a href="<?=site_url('cm/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-plus"></i>Create
            </a>
          </div>
            </div>
            <div class="card-body">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
              <thead>
              <tr>
                <th>No.</th>
                <th>Part Number</th>
                <th>Part Name</th>
                <th>Komposisi</th>
                <th>Satuan</th>
                <th>Harga</th>
                <th>Leadtime (bulan)</th>
                <th>OHI</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($row->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->part_number?></td>
                  <td><?=$data->part_name?></td>
                  <td><?=$data->komposisi?></td>
                  <td><?=$data->satuan?></td>
                  <td><?=$data->harga?></td>
                  <td><?=$data->leadtime?></td>
                  <td><?=$data->ohi?></td>
                  <td><?=$data->keterangan?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('cm/edit/'.$data->id_cm)?>" class="btn btn-primary btn-sm">
                    <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('cm/del/'.$data->id_cm)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm">
                      <i class="fa fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
              } ?>
            </tbody>
                </table>


          </section>

          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
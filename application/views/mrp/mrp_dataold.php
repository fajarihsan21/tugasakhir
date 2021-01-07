        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="box-title"><?= $title;  ?></h1>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="pull-right">
            <a href="<?=site_url('mrp/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-plus"></i>Create
            </a>
          </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
              <tr>
                <th>No.</th>
                <th>Bulan</th>
                <th>Consumable Material</th>
                <th>Jumlah /ML</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($rows->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->id_bulan?></td>
                  <td><?=$data->id_cm?></td>
                  <td><?=$data->jumlah?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('mrp/edit/'.$data->id_mrp)?>" class="btn btn-primary btn-xs">
                      <i class="fa fa-edit"></i> Update
                    </a>
                    <a href="<?=site_url('mrp/del/'.$data->id_mrp)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-xs">
                      <i class="fa fa-trash"></i> Delete
                    </a>
                  </td>
                </tr>
                <?php
              } ?>
            </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
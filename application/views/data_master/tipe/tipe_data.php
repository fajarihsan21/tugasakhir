        <div class="container-fluid">

          <!-- Page Heading -->

          <!-- Tabel -->
          <section class="content">
          <div class="box">
          <div class="box-header">
          <h3 class="box-title"><?= $title;  ?></h3>
          <div class="pull-right">
            <a href="<?=site_url('tipe/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-plus"></i>Create
            </a>
          </div>
          </div>
          <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="table1">
            <br>
            <thead>
              <tr>
                <th>No.</th>
                <th>Tipe Mobil</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($row->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->tipe_mobil?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('tipe/edit/'.$data->id_tipe)?>" class="btn btn-primary btn-sm">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('tipe/del/'.$data->id_tipe)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm">
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

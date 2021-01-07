        <div class="container-fluid">

          <!-- Page Heading -->

            <!-- Tabel -->
          <section class="content">
          <div class="box">
          <div class="box-header">
          <h3 class="box-title"><?= $title;  ?></h3>
          <?= $this->session->flashdata('alert'); ?>
          <div class="pull-right">
            <a href="<?=site_url('bom/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-plus"></i>Create
            </a>
          </div>
          </div>
          <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="dataTable">
            <br>
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama Mobil</th>
                <th>Part Name</th>
                <th>Kebutuhan /ML</th>
                <th>Altered</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($rows->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->nama_mobil?></td>
                  <td><?=$data->part_name?></td>
                  <td><?=$data->kebutuhan?></td>
                  <td><?=$data->altered?></td>
                  <td><?=$data->keterangan?></td>
                  <td class="text-center" width="160px">
                   <!--  <a href="<?=site_url('bom/detail/'.$data->id_bom)?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-search"></i> -->
                    </a>
                    <a href="<?=site_url('bom/edit/'.$data->id_bom)?>" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('bom/del/'.$data->id_bom)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
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
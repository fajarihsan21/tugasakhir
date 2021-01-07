        <div class="container-fluid">

          <!-- Page Heading -->

            <!-- Tabel -->
          <section class="content">
          <div class="box">
          <div class="box-header">
          <h3 class="box-title"><?= $title;  ?></h3>
          <?= $this->session->flashdata('alert'); ?>
          <div class="pull-right">
            <a href="<?=site_url('mpp/add')?>" class="btn btn-primary btn-flat">
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
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Nama Mobil</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($rows->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->tahun?></td>
                  <td><?=$data->nama_bulan?></td>
                  <td><?=$data->nama_mobil?></td>
                  <td><?=$data->jumlah?></td>
                  <td><?=$data->keterangan?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('mpp/edit/'.$data->id_mpp)?>" class="btn btn-primary btn-sm">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('mpp/del/'.$data->id_mpp)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm">
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

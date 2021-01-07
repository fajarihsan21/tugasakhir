 <!-- Begin Page Content -->
        <div class="container-fluid">

          <section class="content">
          <div class="box">
          <div class="box-header">
          <h3 class="box-title"><?= $title;  ?></h3>
          <?= $this->session->flashdata('alert'); ?>
          <div class="pull-right">
            <a href="<?=site_url('mobil/add')?>" class="btn btn-primary btn-flat">
              <i class="fa fa-plus"></i>Create
            </a>
          </div>
          </div>
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                  <br>
              <thead>
              <tr>
                <th>No.</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Jenis</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($rows->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->kode_mobil?></td>
                  <td><?=$data->nama_mobil?></td>
                  <td><?=$data->tipe_mobil?></td>
                  <td><?=$data->jenis_mobil?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('mobil/edit/'.$data->id_mobil)?>"class="btn btn-primary btn-sm">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('mobil/del/'.$data->id_mobil)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm">
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

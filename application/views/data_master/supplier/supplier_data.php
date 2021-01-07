        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <section class="content">
         <!-- Page Heading -->
          <h3 class="box-title"><?= $title;  ?></h3>
          <?= $this->session->flashdata('alert'); ?>
          <p class="mb-2"></p>
          <!-- DataTales Example -->
              <div class="pull-right">
            <a href="<?=site_url('supplier/add')?>" class="btn btn-primary btn-flat">
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
                <th>Kode Supplier</th>
                <th>Nama Supplier</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              foreach($row->result() as $key => $data) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$data->kode_supplier?></td>
                  <td><?=$data->nama_supplier?></td>
                  <td><?=$data->address?></td>
                  <td><?=$data->phone?></td>
                  <td class="text-center" width="160px">
                    <a href="<?=site_url('supplier/edit/'.$data->id_supplier)?>" class="btn btn-primary btn-sm">
                      <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <a href="<?=site_url('supplier/del/'.$data->id_supplier)?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm">
                      <i class="fa fa-fw fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php
              } ?>
            </tbody>
          </table>  


          </div>
          </section>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

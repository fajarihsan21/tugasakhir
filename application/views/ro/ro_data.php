        

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="box-title"><?= $title;  ?></h1>
          <!-- DataTales Example -->
         
             <!-- Collapsable Card Example -->
              <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Periode</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                     <form action="<?=site_url('ro/')?>" method="post">
                      <div class="form-group">
                         <label for="tahun">Tahun: </label>
                          <select name="tahun" id="tahun">
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label>Bulan: </label>
                        <select name="bulan" id="bulan">
                            <option value="1">Januari</option>
                            <option value="2">Febuari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                      </div>

                       <div class="container-fluid">
                        <button type="submit" class="btn btn-primary">Lihat</button>
                        
                        <a class="btn btn-danger" href="<?php echo base_url('ro/print')?>"><i class="fa fa-print"></i>Print</a>
                              <?php 
                                  if (isset($tahun)) {
                                      // echo $tahun;
                                      $link = $tahun."/".$bulan;
                                   ?>
                                  
                              <?php        
                                  }
                              ?>
                          </div>
                        <!-- <button type="submit" class="btn btn-primary">Lihat</button> -->

                     </form>
                  </div>
                </div>
              </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
              <tr>
                <th>No.</th>
                <th>Periode</th>
                <th>Part Number</th>
                <th>Consumable Material</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Supplier</th>
                <th>Total Harga</th>
              </tr>
            </thead>
        
            <tbody>
              <?php $no = 1;
              if($record){
              foreach($record as $b) { ?>
                <tr>
                  <td style="width: 5%"><?=$no++?>.</td>
                  <td><?=$b->periode?></td>
                  <td><?=$b->part_number?></td>
                  <td><?=$b->part_name?></td>
                  <td><?=$b->total?></td>
                  <td><?=$b->harga?></td>
                  <td><?=$b->nama_sup?></td>
                  <td><?=$b->total_harga?></td>
                </tr>
                <?php
                } 
              }?>
            </tbody>
                </table>
              </div>
            </div>
 

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
       <div class="container-fluid">

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> <?= $title;  ?></h3>
      <div class="pull-right">
        <a href="<?=site_url('cm')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>
    <br>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('cm/process')?>" method="post">
            <div class="form-group">
              <label>Part Number *</label>
              <input type="hidden" name="id" value="<?=$row->id_cm?>">
              <input type="text" name="part_number" value="<?=$row->part_number?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Part Name *</label>
              <input type="text" name="part_name" value="<?=$row->part_name?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Komposisi *</label>
              <input type="text" name="komposisi" value="<?=$row->komposisi?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Satuan *</label>
              <input type="text" name="satuan" value="<?=$row->satuan?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Harga *</label>
              <input type="number" name="harga" value="<?=$row->harga?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Leadtime *</label>
              <input type="number" name="leadtime" value="<?=$row->leadtime?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>On Hand Inventory *</label>
              <input type="number" name="ohi" value="<?=$row->ohi?>" class="form-control" required>
            </div>
             <div class="form-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" value="<?=$row->keterangan?>" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
              <button type="Reset" class="btn btn-secondary">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


       </div>
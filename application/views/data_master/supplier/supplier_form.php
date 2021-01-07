       <div class="container-fluid">

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> <?= $title;  ?></h3>
      <div class="pull-right">
        <a href="<?=site_url('supplier')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('supplier/process')?>" method="post">
            <div class="form-group">
              <label>Kode supplier *</label>
              <input type="hidden" name="id" value="<?=$row->id_supplier?>">
              <input type="text" name="kode_supplier" value="<?=$row->kode_supplier?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Nama supplier *</label>
              <input type="text" name="nama_supplier" value="<?=$row->nama_supplier?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Address *</label>
              <input type="text" name="address" value="<?=$row->address?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone *</label>
              <input type="text" name="phone" value="<?=$row->phone?>" class="form-control" required>
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
       <div class="container-fluid">

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> <?= $title;  ?></h3>
      <div class="pull-right">
        <a href="<?=site_url('tipe')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>
    <br>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('tipe/process')?>" method="post">
            <div class="form-group">
              <label>Tipe Mobil *</label>
              <input type="hidden" name="id" value="<?=$row->id_tipe?>">
              <input type="text" name="tipe_mobil" value="<?=$row->tipe_mobil?>" class="form-control" required>
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
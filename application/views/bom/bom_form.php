       <div class="container-fluid">

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> <?= $title;  ?></h3>
      <div class="pull-right">
        <a href="<?=site_url('bom')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>
    <br>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('bom/process')?>" method="post">
            <div class="form-group">
              <input type="hidden" name="id_bom" value="<?=$row->id_bom?>" class="form-control" required>
              <label>Mobil *</label>
              <select name="mobil" class="form-control"><option value="">- Pilih -</option>
                <?php foreach($mobil->result() as $key => $data) { ?> <option value="<?=$data->id_mobil?>" <?=$data->id_mobil == $row->id_mobil ? "selected" : null?>><?=$data->nama_mobil?></option><?php } ?></select>
            </div>
            <div class="form-group">
              <label>Part Name *</label>
              <?= form_dropdown('id_cm', $cm, $selectedcm,
              ['class' => 'form-control', 'required' => 'required'])?>
            </div>
            <div class="form-group">
              <label>Kebutuhan *</label>
              <input type="number" name="kebutuhan" value="<?=$row->kebutuhan?>" class="form-control" required> 
              <div class="input-group-append">
                 <span class="input-group-text" id="basic-addon">ML</span>
              </div>
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
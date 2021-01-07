       <div class="container-fluid">

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> <?= $title;  ?></h3>
      <div class="pull-right">
        <a href="<?=site_url('mpp')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>
    <br>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('mpp/process')?>" method="post">
            <div class="form-group">
              <input type="hidden" name="id_mpp" value="<?=$row->id_mpp?>" class="form-control" required>
              <label>Tahun *</label>
              <input type="number" name="tahun" value="<?=$row->tahun?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Bulan *</label>
              <?= form_dropdown('id_bulan', $bulan, $selectedbulan,
              ['class' => 'form-control', 'required' => 'required'])?>
            </div>
            <div class="form-group">
              <label>Mobil *</label>
              <?= form_dropdown('id_mobil', $mobil, $selectedmobil,
              ['class' => 'form-control', 'required' => 'required'])?>
            </div>
            <div class="form-group">
              <label>Jumlah *</label>
              <input type="number" name="jumlah" value="<?=$row->jumlah?>" class="form-control" required>
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
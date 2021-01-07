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
               <label>Tahun: </label>
                <select name="tahun" id="tahun">
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                </select>
            </div>
            <div class="form-group">
              <label>Bulan *</label>
              <?= form_dropdown('id_mpp', $mpp, $selectedmpp,
              ['class' => 'form-control', 'required' => 'required'])?>
            </div>
          </form>
            <div class="form-group">
              <label>Consumable Material *</label>
              <?= form_dropdown('id_bom', $bom, $selectedbom,
              ['class' => 'form-control', 'required' => 'required'])?>
            </div>
            <div class="form-group">
              <label>Jumlah *</label>
              <input type="number" name="jumlah" value="<?=$row->jumlah?>" class="form-control" required>
              <div class="input-group-append">
                 <span class="input-group-text" id="basic-addon">ML</span>
                </div>
            </div>
            <div class="form-group">
              <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>


       </div>
<form method="post" action="<?=$action?>">
    <input type="hidden" name="id_kualifikasi" value="<?=$id_kualifikasi?>"/>
    <div class="form-group">
        <label class="control-label">Kode Kualifikasi</label>
        <input class="form-control col-4" type="text" name="kode_kualifikasi" value="<?=$kode_kualifikasi?>">
    </div>
    <div class="form-group">
        <label class="control-label">Nama Kualifikasi</label>
        <input class="form-control col-8" type="text" name="nama_kualifikasi" value="<?=$nama_kualifikasi?>">
    </div>    
    
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="<?= base_url('kualifikasi')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      
</form>


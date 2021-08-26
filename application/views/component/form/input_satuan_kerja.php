<form method="post" action="<?=$action?>">
    <input type="hidden" name="id_satker" value="<?=$id_satker?>">
    <div class="form-group">
        <label class="control-label">Nama Satuan Kerja</label>
        <input class="form-control col-8" type="text" name="stk_nama" value="<?=$stk_nama?>">
    </div>
    
    <div class="form-group">
        <label class="control-label">Alamat</label>
        <textarea class="form-control col-8" rows="4" name="stk_alamat"><?=$stk_alamat?></textarea>
    </div>

    <div class="form-group">
        <label class="control-label">Telepon</label>
        <input class="form-control col-4" type="text" name="stk_telepon" value="<?=$stk_telepon?>">
    </div>  
  
    <div class="form-group">
        <label class="control-label">Kode Satuan Kerja</label>
        <input class="form-control col-4" type="text" name="stk_kode" value="<?=$stk_kode?>">
    </div>  
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>


</form>

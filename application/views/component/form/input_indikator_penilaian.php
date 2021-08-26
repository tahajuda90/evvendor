<form method="post" action="<?=$action?>">
<div class="form-group">
        <label class="control-label">Nama Indikator</label>
        <input type="hidden" name="id_group" value="<?=$id_group?>" />
        <input type="hidden" name="id_indikator" value="<?=$id_indikator?>" />
        <input class="form-control col-8" type="text" name="nama_indikator" value="<?=$nama_indikator?>">
    </div>
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    
</form>


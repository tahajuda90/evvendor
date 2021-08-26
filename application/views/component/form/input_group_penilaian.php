<form method="post" action="<?=$action?>">
<div class="form-group">
        <label class="control-label">Nama Group</label>
        <input type="hidden" name="id_group" value="<?=$id_group?>">
        <input class="form-control col-8" type="text" value="<?=$nama_group?>" name="nama_group">
    </div> 
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</form>


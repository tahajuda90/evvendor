<form method="post" action="<?=$action?>">
    <input type="hidden" name="id_btu" value="<?=$id_btu?>">
<div class="form-group">
        <label class="control-label">Nama Bentuk Usaha</label>
        <input class="form-control col-9" type="text" name="btu_nama" value="<?=$btu_nama?>">
    </div>
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="<?= base_url('bntkusaha')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>

</form>

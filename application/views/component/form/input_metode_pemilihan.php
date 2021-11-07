<form method="post" action="<?=$action?>">
    <input type="hidden" name="id_mtd" value="<?=$id_mtd?>" />
    <div class="form-group">
        <label class="control-label">Jenis Pemilihan</label>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" <?= $is_nontender == 1 ? "checked" : "" ?>  type="radio" value="1" name="is_nontender">Non-Tender
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input class="form-check-input" <?= $is_nontender == 0 ? "checked" : "" ?>  type="radio" value="0" name="is_nontender">Tender
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">Metode Pemilihan</label>
        <input class="form-control col-8" type="text" name="nama_metode" value="<?=$nama_metode?>">
    </div>
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="<?= base_url('metode')?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
</form>
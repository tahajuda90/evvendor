<h3 class="tile-title">Form Input Pengalaman</h3>
<div class="tile-body">
<form method="POST" action="<?= base_url('C_RknDetail/prl_action')?>" class="row">
    <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
    <div class="form-group col-12">
        <label class="control-label">Nama Peralatan</label>
        <input class="form-control col-8" type="text" name="alt_jenis">
    </div>

    <div class="form-group col-12">
        <label class="control-label">Merk/Tipe</label>
        <input class="form-control col-7" type="text" name="alt_merktipe">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Jumlah</label>
        <input class="form-control" type="text" name="alt_jumlah">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Kapasitas</label>
        <input class="form-control" type="text" name="alt_kapasitas">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Tahun Pembuatan</label>
        <input class="form-control" type="text" name="alt_thpembuatan">
    </div>

    <div class="form-group col-7">
        <label class="control-label">Lokasi Peralatan</label>
        <input class="form-control" type="text" name="alt_lokasi">
    </div>

    <div class="form-group col-5">
        <label class="control-label">Status Kepemilikan</label>
        <input class="form-control" type="text" name="alt_kepemilikan">
    </div>
    
    <div class="col-12">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="<?= base_url('rekanan/detail/'.$rekanan->id_rekanan)?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>
</form>
</div>

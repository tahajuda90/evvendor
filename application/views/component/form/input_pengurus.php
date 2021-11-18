<h3 class="tile-title">Form Input Pengurus</h3>
<div class="tile-body">
    <form method="POST" action="<?= base_url('C_RknDetail/pgr_action')?>" class="row">
        <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
        <div class="form-group col-12">
            <label class="control-label">Nama Pengurus</label>
            <input class="form-control col-9" type="text" name="pgr_nama">
        </div>

        <div class="form-group col-12">
            <label class="control-label">No KTP Pengurus</label>
            <input class="form-control col-9" type="text" name="pgr_ktp">
        </div>

        <div class="form-group col-12">
            <label class="control-label">NPWP Pengurus</label>
            <input class="form-control col-8" type="text" name="pgr_npwp">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Jabatan Pengurus</label>
            <input class="form-control col-6" type="text" name="pgr_jabatan">
        </div>

        <div class="form-group col-12">
            <label class="control-label">Alamat</label>
            <textarea class="form-control col-9" rows="4" name="pgr_alamat"></textarea>
        </div>
        <div class="col-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
        <a class="btn btn-secondary" href="<?= base_url('rekanan/detail/'.$rekanan->id_rekanan)?>"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
    </form>
</div>

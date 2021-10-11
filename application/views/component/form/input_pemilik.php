<h3 class="tile-title">Form Input Pemilik</h3>
<div class="tile-body">
    <form method="POST" action="<?= base_url('C_RknDetail/pml_action')?>" class="row">
        <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
        <div class="form-group col-12">
            <label class="control-label">Nama Pemilik</label>
            <input class="form-control col-9" type="text" name="pml_nama">
        </div>

        <div class="form-group col-12">
            <label class="control-label">No KTP Pemilik</label>
            <input class="form-control col-9" type="text" name="pml_ktp">
        </div>

        <div class="form-group col-12">
            <label class="control-label">NPWP Pemilik</label>
            <input class="form-control col-8" type="text" name="pml_npwp">
        </div>

        <div class="form-group col-9">
            <label class="control-label">Alamat</label>
            <textarea class="form-control" rows="4" name="pml_alamat"></textarea>
        </div>

        <div class="form-group col-3">
            <label class="control-label">Saham Pemilik</label>
            <input class="form-control" type="text" name="pml_saham">
        </div>
        <div class="col-12">
        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
        <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
        </div>
    </form>
</div>


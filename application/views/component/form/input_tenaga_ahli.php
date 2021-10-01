<h3 class="tile-title">Form Input Pengalaman</h3>
<div class="tile-body">
<form method="POST" action="<?= base_url('C_RknDetail/ahl_action')?>" class="row">
    <input type="hidden" name="id_rekanan" value="<?= $rekanan->id_rekanan ?>">
    <div class="form-group col-8">
        <label class="control-label">Nama Tenaga Ahli</label>
        <input class="form-control" type="text" name="sta_nama">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Tanggal Lahir</label>
        <input class="form-control" id="demoDate1" type="text" name="sta_tgllahir">
    </div>

    <div class="form-group col-12">
        <label class="control-label">Alamat</label>
        <textarea class="form-control" rows="4" name="sta_alamat"></textarea>
    </div>

    <div class="form-group col-12">
        <label class="control-label">Kewarganegaraan</label>
        <input class="form-control col-6" type="text" name="sta_kewarganegaraan">
    </div>

    <div class="form-group col-12">
        <label class="control-label">Jabatan</label>
        <input class="form-control col-6" type="text" name="sta_jabatan">
    </div>

    <div class="form-group col-8">
        <label class="control-label">Pendidikan Terakhir</label>
        <input class="form-control" type="text" name="sta_pendidikan">
    </div>

    <div class="form-group col-4">
        <label class="control-label">Pengalaman Kerja (Tahun)</label>
        <input class="form-control" type="text" name="sta_pengalaman">
    </div>

    <div class="form-group col-12">
        <label class="control-label">Profesi/Keahlian</label>
        <input class="form-control col-7" type="text" name="sta_keahlian">
    </div>

    <div class="form-group col-6">
        <label class="control-label">Telepon</label>
        <input class="form-control" type="text" name="sta_telepon">
    </div>

    <div class="form-group col-6">
        <label class="control-label">Email</label>
        <input class="form-control" type="text" name="sta_email">
    </div>
    
    <div class="col-12">
    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Tambah</button>&nbsp;&nbsp;&nbsp;
    <a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
    </div>

</form>
</div>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/bootstrap-datepicker.min.js"></script>
 <script type="text/javascript">
$( document ).ready(function() {
    $('#demoDate1').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });

});
    </script>
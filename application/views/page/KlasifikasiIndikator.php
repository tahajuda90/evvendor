<div class="app-title">
    <div>
        <h1>Indikator Kualifikasi <?= ucfirst($klasifikasi->nama_kualifikasi)?></h1>
        <p>Indikator Penilaian Pada Kualifikasi pekerjaan / Jenis Pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('kualifikasi')?>">Kualifikasi Pekerjaan</a></li>
        <li class="breadcrumb-item active">Indikator Penilaian</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-warning">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <p>Nilai bobot dibawah ini harap diisi dengan nilai pada rentang <b>1 s/d 10</b></p>
        </div>
        <div class="tile">
            <h3 class="tile-title">Daftar Indikator Kualifikasi</h3>
            <div class="tile-body">
                <form method="post" action="<?= base_url('C_Klasifikasi/update_action_ind')?>">
                    <input type="hidden" value="<?=$klasifikasi->id_kualifikasi?>" name="id_kualifikasi">
                    <a class="btn btn-success btn-sm" href="<?= base_url('kualifikasi/penilaian?kualifikasi=').$klasifikasi->id_kualifikasi?>" type="button"><i class="fa fa-plus"> Indikator</i></a>
                <?= $indikator != null ? '<button class="btn btn-primary btn-sm" type="submit">update</button>' : ''?>
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 25%">Group Penialain</th>
                            <th style="width: 25%">Indikator Penilaian</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($indikator)){
                      $no =1;
     foreach ($indikator as $idktr){
                      ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$idktr->nama_group?></td>
                            <td><?=$idktr->nama_indikator?></td>
                            <td><input class="form-control col-4" type="text" name="bobot[<?=$idktr->id_indkua?>]" value="<?=$idktr->bobot?>" /></td>
                            <td><?=$idktr->active == 1 ? "<a class='btn btn-danger btn-sm' href='".base_url('C_Klasifikasi/activation_ind/').$idktr->id_indkua."' type='button'>Deactivate</a>" : "<a class='btn btn-success btn-sm' href='".base_url('C_Klasifikasi/activation_ind/').$idktr->id_indkua."' type='button'>Activate</a>" ?></td>
                        </tr>
                        <?php
     $no++;} }else{
                      echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
                  }?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</div>
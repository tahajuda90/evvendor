<div class="app-title">
    <div>
        <h1>Aspek Penilaian Kualifikasi <?= ucfirst($klasifikasi->nama_kualifikasi)?></h1>
        <p>Aspek Penilaian Pada Kualifikasi pekerjaan / Jenis Pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('kualifikasi')?>">Kualifikasi Pekerjaan</a></li>
        <li class="breadcrumb-item active">Aspek Penilaian</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-dismissible alert-warning">
            <button class="close" type="button" data-dismiss="alert">×</button>
            <h4>Warning!</h4>
            <p>Pastikan pada kolom jumlah bernilai <b>100%</b></p>
        </div>
        <div class="tile">
            <h3 class="tile-title">Daftar Aspek Penilaian Kualifikasi</h3>
            <div class="tile-body">                    
                    <a class="btn btn-success btn-sm" href="<?= base_url('kualifikasi/penilaian?kualifikasi=').$klasifikasi->id_kualifikasi?>" type="button"><i class="fa fa-plus"> Indikator</i></a>
                
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10%">No</th>
                                <th>Aspek Penilaian</th>
                                <th>Bobot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($group)){
                      $no =1;
                      $jmlh = 0;
     foreach ($group as $grp){
         $jmlh = $jmlh + $grp->bobot;
                      ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$grp->nama_group?></td>
                            <td><?=$grp->bobot?></td>
                            <td><a class='btn btn-primary btn-sm' href='<?=base_url('kualifikasi/indikator/'.$klasifikasi->id_kualifikasi.'/'.$grp->id_group)?>' type='button'>Indikator</a></td>
                        </tr>
                            <?php
     $no++;} 
     
echo '<tr><td><b>Jumlah</b></td><td colspan="4" style="text-align:center;"> '.$jmlh.'% </td><tr>';
     }else{
                      echo '<tr><td colspan="4" style="text-align:center;">No Data</td></tr>';
                  }?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
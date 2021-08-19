<div class="app-title">
    <div>
        <h1>Kualifikasi Pekerjaan</h1>
        <p>Kualifikasi pekerjaan / Jenis Pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Kualifikasi Pekerjaan</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Daftar Kualifikasi Pekerjaan</h3>
            <div class="tile-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 15%">Kode Kualifikasi</th>
                            <th style="width: 55%">Nama Kualifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($klasifikasi)){
                      $no =1;
     foreach ($klasifikasi as $kls){
                      ?>
                        <tr>
                            <td><?=$no?></td>
                            <td><?=$kls->kode_kualifikasi?></td>
                            <td><?=$kls->nama_kualifikasi?></td>
                            <td><a class="btn btn-primary btn-sm" href="<?=$kls->id_kualifikasi?>" type="button">Indikator</a> 
                              <a class="btn btn-warning btn-sm" href="<?=$kls->id_kualifikasi?>" type="button">Update</a>
                              <?= $kls->child == 0 ? "<a class='btn btn-danger btn-sm' href='".$kls->id_kualifikasi."' type='button'>Delete</a>" : "" ?></td>
                        </tr>
                         <?php
     $no++;} }else{
                      echo '<tr><td colspan="3" style="text-align:center;">No Data</td></tr>';
                  }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
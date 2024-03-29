<div class="app-title">
    <div>
        <h1>Indikator Penilaian</h1>
        <p>Daftar parameter indikator penilaian vendor</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('group')?>">Group Penilaian</a></li>
        <li class="breadcrumb-item active">Indikator Penilaian</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Input Indikator Penilaian</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/input_indikator_penilaian');?>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Daftar Indikator Penilaian <?= ucfirst($group->nama_group)?></h3>
            <div class="tile-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width:70%">Nama Indikator</th>
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
                          <td><?=$idktr->nama_indikator?></td>
                          <td><a class="btn btn-warning btn-sm" href="<?= base_url('group/indikator/update/'.$idktr->id_indikator)?>" type="button">Update</a>
                              <?= $idktr->child == 0 ? "<a class='btn btn-danger btn-sm' href='".base_url('C_IndikatorNilai/delete_ind/'.$idktr->id_indikator)."' type='button'>Delete</a>" : "" ?></td>
                      </tr>
                        <?php
     $no++;} }else{
                      echo '<tr><td colspan="4" style="text-align:center;">No Data</td></tr>';
                  }?>
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>


<div class="app-title">
    <div>
        <h1>Aspek Penilaian</h1>
        <p>Daftar parameter aspek penilaian vendor</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="<?= site_url('home')?>"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Aspek Penilaian</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Input Aspek Penilaian</h3>
            <div class="tile-body">
                <?php $this->load->view('component/form/input_group_penilaian');?>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Daftar Aspek Penilaian</h3>
            <div class="tile-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th style="width:70%">Nama Aspek Penilaian</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  <?php if(isset($group)){
                      $no =1;
     foreach ($group as $gr){
                      ?>
                  <tr>
                          <td><?=$no?></td>
                          <td><?=$gr->nama_group?></td>
                          <td><a class="btn btn-primary btn-sm" href="<?= base_url('group/indikator/'.$gr->id_group)?>" type="button">Indikator</a> 
                              <a class="btn btn-warning btn-sm" href="<?= base_url('group/update/'.$gr->id_group)?>" type="button">Update</a>
                              <?= $gr->child == 0 ? "<a class='btn btn-danger btn-sm' href='".base_url('C_IndikatorNilai/delete/'.$gr->id_group)."' type='button'>Delete</a>" : "" ?></td>
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

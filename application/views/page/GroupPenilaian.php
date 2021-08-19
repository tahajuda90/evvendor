<div class="app-title">
    <div>
        <h1>Group Penilaian</h1>
        <p>Daftar parameter group penilaian vendor</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Group Penilaian</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Daftar Group Penilaian</h3>
            <div class="tile-body">
                <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th style="width:70%">Nama Group</th>
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
                          <td><a class="btn btn-primary btn-sm" href="<?=$gr->id_group?>" type="button">Indikator</a> 
                              <a class="btn btn-warning btn-sm" href="<?=$gr->id_group?>" type="button">Update</a>
                              <?= $gr->child == 0 ? "<a class='btn btn-danger btn-sm' href='".$gr->id_group."' type='button'>Delete</a>" : "" ?></td>
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

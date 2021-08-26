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
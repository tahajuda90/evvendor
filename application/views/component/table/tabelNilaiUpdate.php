<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th style="width: 25%">Group Penialain</th>
            <th style="width: 25%">Indikator Penilaian</th>
            <th>Bobot</th>
            <th style="width:15%">Input Nilai</th>
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
                            <td><?=$idktr->bobot?></td>
                            <td><input class="form-control" name="nilai_<?=$idktr->id_detail?>" type="number" step="0.01" value="<?=$idktr->nilai?>"/></td>
                        </tr>
        <?php
     $no++;} }else{
                      echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
                  }?>
    </tbody>
</table>
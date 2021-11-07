<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th style="width: 30%">Jenis Pengadaan</th>
            <th style="width: 40%">Nama Metode</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($metode)){
                      $no =1;
     foreach ($metode as $mtd){
                      ?>
        <tr>
            <td><?=$no?></td>
            <td><?=($mtd->is_nontender == 1 ? 'Non-Tender':'Tender')?></td>
            <td><?=$mtd->nama_metode?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="<?=base_url('metode/update/').$mtd->id_mtd?>" type="button">Update</a>
                <?= $mtd->child == 0 ? "<a class='btn btn-danger btn-sm' href='".base_url('C_Metode/delete/').$mtd->id_mtd."' type='button'>Delete</a>" : "" ?>
            </td>
        </tr>
        <?php
     $no++;} }else{
                      echo '<tr><td colspan="4" style="text-align:center;">No Data</td></tr>';
                  }?>
    </tbody>
</table>
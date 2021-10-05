<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jabatan</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($pgr)){
            $no = 1;
            foreach($pgr as $pgr){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$pgr->pgr_nama?><br> No KTP : <?=$pgr->pgr_ktp?><br> NPWP : <?=$pgr->pgr_npwp?></td>
            <td><p><?=$pgr->pgr_alamat?></p></td>
            <td><?=$pgr->pgr_jabatan?></td>
            <td></td>
        </tr>
         <?php
        $no = $no+1;
        }
            } else {
        echo '<tr><td colspan="5" style="text-align:center;">No Data</td></tr>';
        }
        ?>
    </tbody>
</table>

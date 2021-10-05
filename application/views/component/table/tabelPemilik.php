<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Saham</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($pml)){
            $no = 1;
            foreach($pml as $pml){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$pml->pml_nama?><br> No KTP : <?=$pml->pml_ktp?><br> NPWP : <?=$pml->pml_npwp?></td>
            <td><p><?=$pml->pml_alamat?></p></td>
            <td><?=$pml->pml_saham?></td>
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

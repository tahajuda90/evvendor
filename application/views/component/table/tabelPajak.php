<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>No Bukti Pajak</th>
            <th>Jenis Pajak</th>
            <th>Tanggal</th>
            <th>Tahun</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($pjk)){
            $no = 1;
            foreach($pjk as $pjk){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$pjk->pjk_no?></td>
            <td><?=$pjk->pjk_jenis?></td>
            <td><?=$pjk->pjk_tanggal?></td>
            <td><?=$pjk->pjk_tahun?></td>
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


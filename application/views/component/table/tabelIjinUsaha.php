<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor</th>
            <th>Jenis Ijin</th>
            <th>Klasifikasi</th>
            <th>Instansi Penerbit</th>
            <th>Berlaku</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($ius)){
            $no = 1;
            foreach($ius as $ius){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$ius->ius_no?></td>
            <td><?=$ius->ius_jenis?></td>
            <td><p><?=$ius->ius_klasifikasi?></p></td>
            <td><?=$ius->ius_instansi?></td>
            <td><?=($ius->status_berlaku == 0 ? fdate($ius->tanggal_berlaku) : 'Tidak Berlaku')?></td>
            <td></td>
        </tr>
        <?php
        $no = $no+1;
        }
        
            } else {
        echo '<tr><td colspan="7" style="text-align:center;">No Data</td></tr>';
        }
        ?>
    </tbody>
</table>
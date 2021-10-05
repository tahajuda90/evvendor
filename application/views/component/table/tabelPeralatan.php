<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Alat</th>
            <th>Jumlah</th>
            <th>Tahun Buat</th>
            <th>Lokasi</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($prl)){
            $no = 1;
            foreach($prl as $prl){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$prl->alt_jenis?><br><?=$prl->alt_merktipe?></td>
            <td><?=$prl->alt_jumlah?><br>Kapasitas : <?=$prl->alt_kapasitas?></td>
            <td><?=$prl->alt_thpembuatan?></td>
            <td><?=$prl->alt_lokasi?><br>Kepemilikan : <?=$prl->alt_kepemilikan?></td>
            <td></td>
        </tr>
        <?php
        $no = $no+1;
        }
            } else {
        echo '<tr><td colspan="6" style="text-align:center;">No Data</td></tr>';
        }
        ?>
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Instansi</th>
            <th>Nilai</th>
            <th>Tanggal</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($pgl)){
            $no = 1;
            foreach($pgl as $pgl){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$pgl->pgl_kegiatan?> <br> No Kontrak : <?=$pgl->pgl_nokontrak?></td>
            <td><b><?=$pgl->pgl_pmbtgs?></b><br><?=$pgl->pgl_lokasi?><br><p><?=$pgl->pgl_pmbtgs_alamat?></p></td>
            <td><?= rupiah($pgl->pgl_nilai)?><br>Progress : <?=$pgl->pgl_progres?> %</td>
            <td>Kontrak Mulai : <?=fdate($pgl->pgl_tglkontrak)?><br>Kontrak Selesai : <?= fdate($pgl->pgl_slskontrak)?><br>Serah Terima : <?= fdate($pgl->pgl_slsba)?></td>
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


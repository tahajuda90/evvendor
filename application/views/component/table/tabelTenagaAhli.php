<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Pendidikan</th>
            <th>Jabatan</th>
            <th>Keahlian</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($ahl)){
            $no = 1;
            foreach($ahl as $ahl){ ?>
        <tr>
            <td><?=$no?></td>
            <td><?=$ahl->sta_nama?><br>Tanggal Lahir : <?=fdate($ahl->sta_tgllahir)?><br>Kewarganegaraan : <?=$ahl->sta_kewarganegaraan?></td>
            <td><?=$ahl->sta_alamat?><br><?=$ahl->sta_email?><br><?=$ahl->sta_telepon?></td>
            <td><?=$ahl->sta_pendidikan?></td>
            <td><?=$ahl->sta_jabatan?></td>
            <td><?=$ahl->sta_keahlian?><br>Pengalaman : <?=$ahl->sta_pengalaman?></td>
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


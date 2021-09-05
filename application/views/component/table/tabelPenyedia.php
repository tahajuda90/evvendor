<table class="table table-hover table-bordered" id="sampleTable">
    <thead>
        <tr>
            <td>Nama Penyedia</td>
            <td>NPWP Penyedia</td>
            <td>Alamat</td>
            <td>Kontak</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($rkn)){
            foreach($rkn as $rkn){ ?>
        <tr>
            <td><b>Bentuk Usaha :</b> <?= $rkn->btu_nama?><br>
                <?=$rkn->rkn_nama?>
            </td>
            <td><?=$rkn->rkn_npwp?>
                <br>
                No PKP : <?=$rkn->rkn_pkp?></td>
            <td><?=$rkn->rkn_alamat?> , <?=$rkn->rkn_kodepos?>
            <br>
            <b>Asal Kota/Kabupaten :</b> <?=$rkn->kbp?>
            </td>
            <td><?=$rkn->rkn_telepon?><br> Email : <?=$rkn->rkn_email?></td>
            <td><a class="btn btn-sm btn-warning" type="button" href="<?=base_url('rekanan/update/'.$rkn->id_rekanan)?>">Edit</a>
            <?= ($rkn->child == 0 ? '<a class="btn btn-sm btn-danger" href="'. base_url('C_Rekanan/delete/'.$rkn->id_rekanan).'" type="button">Delete</a>':'') ?>
            </td>
        </tr>        
        <?php        
            }
        }?> 
    </tbody>
</table>
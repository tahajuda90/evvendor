<div class="app-title">
    <div>
        <h1>Aspek & Indikator Penilaian</h1>
        <p>Daftar parameter aspek & indikator penilaian</p>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="<?= base_url('C_Klasifikasi/create_action_ind')?>">
            <input type="hidden" name="id_kualifikasi" value="<?=$klasifikasi?>"/>
            <div class="tile">
            <h3 class="tile-title">Daftar Aspek & Indikator Penilaian</h3>
            <div class="tile-body">                
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width:70%">Nama Indikator</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbdoy>
                        <?php
                        if (isset($join)) {
                            $gn = 1;
                            foreach ($join as $jon) {
                                echo '<tr><td>' . $gn . '</td> <td colspan="2"><b> Aspek : ' . $jon['group']->nama_group . '</b></td></tr>';
                                $gi=1;
                                foreach ($jon['indikator'] as $idktr){?>
                                    <tr><td><?=$gn.'.'.$gi?></td>
                                        <td><?= $idktr->nama_indikator?></td><td style="text-align:center;" >
                      <input name="id_indikator[]" value='<?=$idktr->id_indikator?>' type="checkbox"></td>
                                    </tr>
                                <?php    $gi++;
                                }
                                $gn++;
                            }
                        } else {
                            echo '<tr><td colspan="3" style="text-align:center;">No Data</td></tr>';
                        }
                        ?>
                    </tbdoy>
                </table>
            </div>
            <?php if(isset($klasifikasi)){?>
            <div class="tile-footer">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <?php } ?>
        </div>
        </form>
    </div>        
</div>

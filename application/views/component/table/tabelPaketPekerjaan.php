<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Paket</th>
                    <th>Pagu</th>
                    <th>HPS</th>
                    <th>Satuan Kerja</th>
                    <th>Jenis Pengadaan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($pkt)){
                        foreach($pkt as $pkt){ ?>
                    <tr>
                                <td>Tender : <?= $pkt->lls_id ?><br>
                                Sirup : <?= $pkt->rup_id ?>
                                </td>
                                <td><?=$pkt->pkt_nama?></td>
                                <td><?= rupiah($pkt->pkt_pagu)?></td>
                                <td><?= rupiah($pkt->pkt_hps)?></td>
                                <td><?= $pkt->stk_nama?></td>
                                <td><?= ($pkt->is_nontender == 1 ? 'Non-Tender' : 'Tender')?>
                                    <br>
                                    <?=$pkt->nama_kualifikasi?>
                                </td>
                                <td><?php
                                if(($pkt->child == 0)&&($pkt->is_nontender == 1)||($pkt->pkt_id == null)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('paket/kontrak/create/'.$pkt->id_paket).'">Buat Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }
                                else if(($pkt->child == 0)&&($pkt->pkt_id != null)&&($pkt->is_nontender == 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('C_Integrasi/kontrak_save/').$pkt->id_paket.'">Tarik Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }else if(($pkt->child > 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('paket/kontrak/'.$pkt->id_paket).'">Detail Paket</a>';
                                }else{
                                    echo '<a type="button" class="btn btn-sm btn-primary">Detail</a>';
                                }
                                ?>
                                    <br><a type="button" class="btn btn-sm btn-warning" href="<?= base_url('paket/update/'.$pkt->id_paket)?>">Edit</a>
                                </td>
                            </tr>
                    
                    <?php        
                        }
                    }?>
                  
                </tbody>
                </table>



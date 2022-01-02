<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama Paket</th>
                    <th style="width: 20%">Anggaran</th>
                    <th>Tahun</th>
                    <th>Satuan Kerja</th>
                    <th style="width: 10%">Jenis Pengadaan</th>
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
                                <td>Pagu : <?= rupiah($pkt->pkt_pagu)?><br>HPS : <?= rupiah($pkt->pkt_hps)?></td>
                                <td><?= fdatetahun($pkt->pkt_tgl_buat)?></td>
                                <td><?= $pkt->stk_nama?></td>
                                <td><?= ($pkt->is_nontender == 1 ? '<span class="badge badge-pill badge-info">Non-Tender</span>' : '<span class="badge badge-pill badge-info">Tender/Seleksi</span>')?>
                                    <br>
                                    <?=$pkt->nama_kualifikasi?>
                                    <br>
                                    
                                </td>
                                <td><?php
                                if($pkt->id_kualifikasi == null){
                                    //echo '<button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-id="'.$pkt->id_paket.'" data-val="'.$pkt->pkt_nama.'" data-target="#exampleModal">Pilih Kualifikasi</button>';
                                    echo '<a type="button" class="btn btn-sm btn-info" href="'. base_url('paket/update/'.$pkt->id_paket).'">Pilih Kualifikasi</a>';
                                }
                                else if(($pkt->child == 0)&&($pkt->is_nontender == 1)||($pkt->pkt_id == null)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('C_Integrasi/kontraknon_save/'.$pkt->id_paket).'">Tarik Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }
                                else if(($pkt->child == 0)&&($pkt->pkt_id != null)&&($pkt->is_nontender == 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('C_Integrasi/kontrak_save/').$pkt->id_paket.'">Tarik Kontrak</a>';
                                    echo '<br> <a type="button" class="btn btn-sm btn-danger" href="'. base_url('C_PaketKontrak/delete/'.$pkt->id_paket).'">Delete</a>';
                                }else if(($pkt->child > 0)){
                                    echo '<a type="button" class="btn btn-sm btn-primary" href="'. base_url('paket/kontrak/'.$pkt->id_paket).'">Detail Paket</a>';
                                    echo '<a type="button" class="btn btn-sm btn-warning" href="'. base_url('paket/update/'.$pkt->id_paket).'">Edit</a>';
                                }else{
                                    echo '<a type="button" class="btn btn-sm btn-primary">Detail</a>';
                                }
                                ?>
                                </td>
                            </tr>
                    
                    <?php        
                        }
                    }?>
                  
                </tbody>
                </table>




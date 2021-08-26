<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Kode OPD</th>
                    <th>Nama OPD</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php if(isset($stkr)){
                        foreach($stkr as $str){ ?>
                    <tr>
                                <td><?=$str->stk_kode?></td>
                                <td><?=$str->stk_nama?></td>
                                <td><?=$str->stk_alamat?></td>
                                <td><?=$str->stk_telepon?></td>
                                <td>
                                    <?php
                                    if(property_exists($str, "id_satker")){
                                        echo '<a type="button" href="'.$str->id_satker.'" class="btn btn-warning btn-sm">
                                                 Edit
                                              </a>';
                                    }else if(property_exists($str, "id_satker") && ($str->stk_id != null) && ($str->child<0)){
                                        echo '<a type="button" href="'.$str->id_satker.'" class="btn btn-danger btn-sm">
                                                 Delete
                                              </a>';
                                    }
                                    else{
                                        echo '<a type="button" href="'. base_url('C_Integrasi/Satker_save/').$str->stk_id.'" class="btn btn-primary btn-sm">
                                                <i class="fa fa-download"></i> Tarik Data
                                              </a>';
                                    }
                                    ?>
                                </td>
                            </tr>
                    <?php    }
                        
                    }?>
                  
                </tbody>
</table>
<!-- Data table plugin-->
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vali/')?>js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
    $('#sampleTable').DataTable();
    });
</script>
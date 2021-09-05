<table class="table table-hover table-bordered" id="sampleTable">
    <thead>
        <tr>
            <th style="width: 80%">Bentuk Usaha</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if(isset($bentuk)){
     foreach ($bentuk as $btu){ ?>
        <tr>
            <td><?=$btu->btu_nama?></td>
            <td><a type="button" href="<?=base_url('bntkusaha/update/').$btu->id_btu?>" class="btn btn-warning btn-sm">
                                                 Edit
                                              </a></td>
        </tr>         
  <?php   }   
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
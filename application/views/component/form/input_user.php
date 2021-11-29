<h3 class="tile-title">Form User <?=$button?></h3>
<div class="tile-body">
    <?php if (null !== $message): ?>
              <div class="alert alert-dismissible alert-warning">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <p><?= $message ?></p>
              </div>
          <?php endif ?> 
    <form method="POST" action="<?= base_url(uri_string())?>" class="row">
        <div class="form-group col-6">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" <?=($button=='Edit'?'readonly':'')?> value="<?=$email?>" name="email">
        </div>
        <div class="form-group col-6">
            <label class="control-label">Username</label>
            <input class="form-control" type="text" <?=($button=='Edit'?'readonly':'')?> value="<?=$identity?>" name="identity">
        </div>
        <div class="form-group col-12">
            <?php foreach ($groups as $group):?>
                        <div class="form-check">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  if(isset($currentGroups)){
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }}
              ?>
              <input type="radio" class="form-check-input" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <label class="form-check-label" for="exampleCheck1">
                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
                        </div>
          <?php endforeach?>
        </div>
        <div class="form-group col-6">
            <label class="control-label">Password</label>
            <input class="form-control" id="passInput" type="password" name="password" pattern="<?=$pattern?>">
            <div class="utility">
                <div class="animated-checkbox">
                    <label>
                        <input type="checkbox" id="showPass"><span class="label-text">Show Password</span>
                    </label>
                </div>
            </div>
        </div>
        <?php if($button == 'Edit'):?>
        <div class="form-group col-6">
            <label class="control-label">Password Confirm</label>
            <input class="form-control" id="passInput" type="password" name="password_confirm">
        </div>
        <input type="hidden" name="id" value="<?=$id_user?>">
        <?php endif ?>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><?=$button?></button>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
  
        $('#showPass').on('click', function(){
           var passInput=$("#passInput");
           if(passInput.attr('type')==='password')
             {
               passInput.attr('type','text');
           }else{
              passInput.attr('type','password');
           }
       });
    });
    </script>
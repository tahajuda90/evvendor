<h3 class="tile-title">Change Password </h3>
<div class="tile-body">
        <?php if (null !== $message): ?>
              <div class="alert alert-dismissible alert-warning">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <p><?= $message ?></p>
              </div>
          <?php endif ?>
    <form method="POST" action="<?= base_url(uri_string())?>" class="row">
        <div class="form-group col-12">
            <label class="control-label">Old Password</label>
            <input class="form-control col-6" id="passInput" type="password" name="old">
        </div>
        <div class="form-group col-12">
            <label class="control-label">New Password</label>
            <input class="form-control col-6" id="passInput1" type="password" name="new" >
            <input type="hidden" name="id" value="<?=$id_user?>">
        </div>
        <div class="form-group col-12">
            <label class="control-label">New Password Confirm</label>
            <input class="form-control col-6" id="passInput2" type="password" name="new_confirm" >
            <div class="utility">
                <div class="animated-checkbox">
                    <label>
                        <input type="checkbox" id="showPass"><span class="label-text">Show Password</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
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
           var passInput1=$("#passInput1");
           if(passInput1.attr('type')==='password')
             {
               passInput1.attr('type','text');
           }else{
              passInput1.attr('type','password');
           }
           var passInput2=$("#passInput2");
           if(passInput2.attr('type')==='password')
             {
               passInput2.attr('type','text');
           }else{
              passInput2.attr('type','password');
           }
       });
    });
</script>

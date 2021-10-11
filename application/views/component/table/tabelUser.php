<?php if (null !== $this->session->flashdata('message')): ?>
              <div class="alert alert-dismissible alert-warning">
                  <button class="close" type="button" data-dismiss="alert">×</button>
                  <p><?= $this->session->flashdata('message') ?></p>
              </div>
          <?php endif ?> 
<h3 class="tile-title">Daftar User</h3>
<a type="button" class="btn btn-sm btn-success" href="<?= base_url('user/create')?>">Tambah</a>
<div class="tile-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Group</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($users as $user):
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?php echo htmlspecialchars($user->username, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td>
                        <?php foreach ($user->groups as $group): ?>
                            <?php echo htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'); ?><br/>
    <?php endforeach ?>
                    </td>
                    <td><?php echo ($user->active) ? anchor("C_User/deactivate/" . $user->id, lang('index_active_link')) : anchor("C_User/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                    <td><a class="btn btn-warning btn-sm" href="<?= base_url('user/update/'.$user->id)?>" type="button">Edit</a></td>
                </tr>
                <?php
                $no++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>
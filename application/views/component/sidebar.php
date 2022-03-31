<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= base_url('assets/logo-pemkot.png')?>" style="height: 75px;width: 50px;">
        <div>
          <p class="app-sidebar__user-name">Kota. Kediri</p>
          <p class="app-sidebar__user-designation">Bag. <br>Pengadaan Barang/Jasa</p>
        </div>
      </div>
      <ul class="app-menu">
          <?php
          $name = $this->ion_auth->get_users_groups()->row()->name;
          foreach(load_menu($name) as $menu){
              if(isset($menu['sub'])){
                  echo '<li class="treeview '.(in_array($this->uri->segment(1), array_keys($menu['sub'])) ? 'is-expanded':'').'"><a class="app-menu__item" href="#" data-toggle="treeview">'.$menu['ikon'].'<span class="app-menu__label">'.$menu['menu'].'</span><i class="treeview-indicator fa fa-angle-right"></i></a>'
                          . '<ul class="treeview-menu">';
                  foreach($menu['sub'] as $key=>$sub){
                      echo '<li><a class="treeview-item '.($this->uri->segment(1) === $key ? 'active':'').'" href="'. base_url($key).'"><i class="icon fa fa-circle-o"></i>'.$sub.'</a></li>';
                  }
                  echo '</ul></li>';
              }else{
                  echo '<li><a class="app-menu__item '.($this->uri->segment(1) === $menu['link'] ? 'active' : '').'" href="'.base_url($menu['link']).'">'.$menu['ikon'].'<span class="app-menu__label">'.$menu['menu'].'</span></a></li>';
              }
          }
          ?>
      </ul>
    </aside>

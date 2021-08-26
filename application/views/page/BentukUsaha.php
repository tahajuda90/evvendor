<div class="app-title">
    <div>
        <h1>Bentuk Usaha</h1>
        <p>Bentuk usaha penyedia</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item active">Bentuk Usaha</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <?= !isset($button) ? '<div class="row pull-right">
                <a type="button" href="'.base_url('C_Integrasi/bentukU_save').'" class="btn btn-primary btn-sm">
                    <i class="fa fa-download"></i> Tarik Data
                </a>
            </div>' : ''?>
            <h3 class="tile-title"><?= isset($button) ? $button : 'Daftar'?> Bentuk Usaha</h3>
            <div class="tile-body">
                <?php
                if(isset($button)){
                    $this->load->view('component/form/input_bentuk_usaha');
                }else{
                    $this->load->view('component/table/tabelBentukUsaha');
                }
                ?> 
            </div>
        </div>
    </div>
</div>


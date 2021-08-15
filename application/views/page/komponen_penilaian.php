<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Penilaian</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Template Form</a></li>
    </ul>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Group Penilaian</h3>
                <div class="tile-body">
                    <?php $this->load->view('component/form/input_group_penilaian'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Indikator Penilaian</h3>
                <div class="tile-body">
                    <?php $this->load->view('component/form/input_indikator_penilaian'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Kualifikasi Pekerjaan</h3>
                <div class="tile-body">
                    <?php $this->load->view('component/form/input_kualifikasi_pekerjaan'); ?>
                </div>
            </div>
        </div>
    </div>
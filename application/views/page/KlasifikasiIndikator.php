<div class="app-title">
    <div>
        <h1>Indikator Kualifikasi <?= ucfirst($klasifikasi->nama_kualifikasi)?></h1>
        <p>Indikator Penilaian Pada Kualifikasi pekerjaan / Jenis Pengadaan</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"><a href="#">Kualifikasi Pekerjaan</a></li>
        <li class="breadcrumb-item active">Indikator Penilaian</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Daftar Indikator Kualifikasi</h3>
            <div class="tile-body">
                <a class="btn btn-primary btn-sm" type="button"><i class="fa fa-plus"> Indikator</i></a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 25%">Nama Kualifikasi</th>
                            <th style="width: 25%">Penilaian</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
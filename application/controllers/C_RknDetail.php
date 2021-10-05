<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_RknDetail extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Rekanan','M_Rakta','M_Rius','M_Rpml','M_Rpgr','M_Rpgl','M_Rahli','M_Rprl','M_Rpjk'));
    }
    
    public function rekanan($id){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id);
        $data['akt'] = $this->M_Rakta->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['ius'] = $this->M_Rius->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pml'] = $this->M_Rpml->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pgr'] = $this->M_Rpgr->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pgl'] = $this->M_Rpgl->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['ahl'] = $this->M_Rahli->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['prl'] = $this->M_Rprl->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pjk'] = $this->M_Rpjk->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['page'] = 'page/PenyediaDetail';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function create_ius($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_ijin_usaha';
        $this->load->view('Main_v',$data);
    }
    
    public function ius_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'tanggal_berlaku'=> fdatetimetodb($this->input->post('tanggal_berlaku',TRUE)),
            'status_berlaku'=> ($this->input->post('status_berlaku',TRUE) == 0 ? $this->input->post('status_berlaku',TRUE) : 1),
            'ius_instansi'=> $this->input->post('ius_instansi',TRUE),
            'ius_jenis'=> $this->input->post('ius_jenis',TRUE),
            'ius_klasifikasi'=> $this->input->post('ius_klasifikasi',TRUE),
            'ius_no'=> $this->input->post('ius_no',TRUE)
        );
        if($this->M_Rius->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_akt($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_akta';
        $this->load->view('Main_v',$data);
    }
    
    public function akt_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'lhk_no'=> $this->input->post('lhk_no',TRUE),
            'lhk_tanggal'=> fdatetimetodb($this->input->post('lhk_tanggal',TRUE)),
            'lhk_notaris'=> $this->input->post('lhk_notaris',TRUE)
        );
        if($this->M_Rakta->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_pjk($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_pajak';
        $this->load->view('Main_v',$data);
    }
    
    public function pjk_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'pjk_no'=> $this->input->post('pjk_no',TRUE),
            'pjk_tanggal'=> $this->input->post('pjk_tanggal',TRUE),
            'pjk_jenis'=> $this->input->post('pjk_jenis',TRUE),
            'pjk_tahun'=> $this->input->post('pjk_tahun',TRUE)
        );
        if($this->M_Rpjk->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_pml($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_pemilik';
        $this->load->view('Main_v',$data);
    }
    
    public function pml_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'pml_nama'=> $this->input->post('pml_nama',TRUE),
            'pml_ktp'=> $this->input->post('pml_ktp',TRUE),
            'pml_alamat'=> $this->input->post('pml_alamat',TRUE),
            'pml_npwp'=> $this->input->post('pml_npwp',TRUE),
            'pml_saham'=> $this->input->post('pml_saham',TRUE)
        );
        if($this->M_Rpml->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_pgr($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_pengurus';
        $this->load->view('Main_v',$data);
    }
    
    public function pgr_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'pgr_nama'=> $this->input->post('pgr_nama',TRUE),
            'pgr_ktp'=> $this->input->post('pgr_ktp',TRUE),
            'pgr_alamat'=> $this->input->post('pgr_alamat',TRUE),
            'pgr_npwp'=> $this->input->post('pgr_npwp',TRUE),
            'pgr_jabatan'=> $this->input->post('pgr_jabatan',TRUE)
        );
        if($this->M_Rpgr->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_pgl($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_pengalaman';
        $this->load->view('Main_v',$data);
    }
    
    public function pgl_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'pgl_kegiatan'=> $this->input->post('pgl_kegiatan',TRUE),
            'pgl_lokasi'=> $this->input->post('pgl_lokasi',TRUE),
            'pgl_pmbtgs'=> $this->input->post('pgl_pmbtgs',TRUE),
            'pgl_pmbtgs_alamat'=> $this->input->post('pgl_pmbtgs_alamat',TRUE),
            'pgl_nokontrak'=> $this->input->post('pgl_nokontrak',TRUE),
            'pgl_tglkontrak'=> $this->input->post('pgl_tglkontrak',TRUE),
            'pgl_nilai'=> $this->input->post('pgl_nilai',TRUE),
            'pgl_progres'=> $this->input->post('pgl_progres',TRUE),
            'pgl_slskontrak'=> $this->input->post('pgl_slskontrak',TRUE),
            'pgl_slsba'=> $this->input->post('pgl_slsba',TRUE));
        if($this->M_Rpgl->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_ahl($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_tenaga_ahli';
        $this->load->view('Main_v',$data);
    }
    
    public function ahl_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'sta_nama'=> $this->input->post('sta_nama',TRUE),
            'sta_tgllahir'=> $this->input->post('sta_tgllahir',TRUE),
            'sta_alamat'=> $this->input->post('sta_alamat',TRUE),
            'sta_jabatan'=> $this->input->post('sta_jabatan',TRUE),
            'sta_pendidikan'=> $this->input->post('sta_pendidikan',TRUE),
            'sta_pengalaman'=> $this->input->post('sta_pengalaman',TRUE),
            'sta_keahlian'=> $this->input->post('sta_keahlian',TRUE),
            'sta_telepon'=> $this->input->post('sta_telepon',TRUE),
            'sta_email'=> $this->input->post('sta_email',TRUE),
            'sta_kewarganegaraan'=> $this->input->post('sta_kewarganegaraan',TRUE)
        );
        if($this->M_Rahli->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
    
    public function create_prl($id_penyedia){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id_penyedia);
        $data['page'] = 'page/PenyediaDetailInput';
        $data['form'] = 'component/form/input_peralatan';
        $this->load->view('Main_v',$data);
    }
    
    public function prl_action(){
        $input = array(
            'id_rekanan'=> $this->input->post('id_rekanan',TRUE),
            'alt_jenis'=> $this->input->post('alt_jenis',TRUE),
            'alt_jumlah'=> $this->input->post('alt_jumlah',TRUE),
            'alt_kapasitas'=> $this->input->post('alt_kapasitas',TRUE),
            'alt_merktipe'=> $this->input->post('alt_merktipe',TRUE),
            'alt_thpembuatan'=> $this->input->post('alt_thpembuatan',TRUE),
            'alt_lokasi'=> $this->input->post('alt_lokasi',TRUE),
            'alt_kepemilikan'=> $this->input->post('alt_kepemilikan',TRUE)
        );
        if($this->M_Rprl->insert($input)){
            redirect($this->sess['last_url']);
        }
    }
}
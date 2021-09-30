<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_RknDetail extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Rekanan','M_Rakta','M_Rius','M_Rpml','M_Rpgr','M_Rpgl','M_Rahli','M_Rprl','M_Rpjk'));
    }
    
    public function rekanan($id){
        $data['rekanan'] = $this->M_Rekanan->get_by_id($id);
        $data['akta'] = $this->M_Rakta->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['ius'] = $this->M_Rius->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pemilik'] = $this->M_Rpml->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pengurus'] = $this->M_Rpgr->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pengalaman'] = $this->M_Rpgl->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['ahli'] = $this->M_Rahli->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['alat'] = $this->M_Rprl->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
        $data['pajak'] = $this->M_Rpjk->get_cond(array('id_rekanan'=>$data['rekanan']->id_rekanan));
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
    
    
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class C_Live extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
//        if (!$this->ion_auth->logged_in()) {
//            redirect('login', 'refresh');
//        }
        $this->load->model(array('Integrasi/M_ITdr','Integrasi/M_INtdr'));
//        $this->sess = $this->session->get_userdata();
    }
    
    public function tender(){
        $this->session->set_userdata('last_url',current_url());
        if($this->M_ITdr->is_online()){
            $data['pkt'] = $this->M_ITdr->all();
            $data['title'] = 'Tender';
            $data['page'] = 'page/PaketLpse';
            $this->load->view('Main_v',$data);
        }else{
            redirect('home');
        }
    }
    
    public function non_tdr(){
        $this->session->set_userdata('last_url',current_url());
        if($this->M_INtdr->is_online()){
            $data['pkt'] = $this->M_INtdr->all();
            $data['title'] = 'Non-Tender';
            $data['page'] = 'page/PaketLpse';
            $this->load->view('Main_v',$data);
        }else{
            redirect('home');
        }
    }
    
//    select lq.lls_id,lq.pkt_id,pa.rup_id,lq.pkt_nama,ps.stk_id,sk.stk_nama,lq.pkt_hps,p.pkt_pagu from public.lelang_query lq
//LEFT JOIN paket_anggaran pa ON lq.pkt_id = pa.pkt_id
//LEFT JOIN paket_satker ps ON ps.pkt_id = lq.pkt_id
//LEFT JOIN satuan_kerja sk ON sk.stk_id = ps.stk_id
//LEFT JOIN paket p ON p.pkt_id = lq.pkt_id
//order by lq.lls_id DESC
    
//select lq.lls_id,lq.pkt_id,pp.ppk_id,ps.rup_id,ps.stk_id,p.pkt_nama,sk.stk_nama,lq.pkt_hps,p.pkt_pagu,lq.jadwal_awal_pengumuman,p.pkt_tgl_buat,lq.lls_status from ekontrak.lelang_query lq 
//left join ekontrak.paket_satker ps on ps.pkt_id = lq.pkt_id 
//left join ekontrak.paket_ppk pp on pp.pkt_id = lq.pkt_id 
//left join public.satuan_kerja sk on ps.stk_id = sk.stk_id 
//left join ekontrak.paket p on p.pkt_id = lq.pkt_id 
//order by lq.lls_id desc
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    protected $bulan = "(SELECT DATE_FORMAT(now(), '%y/%m') AS bulan
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 1 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 2 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 3 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 4 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 5 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 6 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 7 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 8 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 9 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 10 MONTH), '%y/%m')
     UNION SELECT DATE_FORMAT(DATE_SUB(now(), INTERVAL 11 MONTH), '%y/%m')) bulans"; 
    
    protected $pakets = "(select DATE_FORMAT( paket.pkt_tgl_buat , '%y/%m' ) AS bulan,
count(paket.id_paket) AS jumlah
from paket
group by 
bulan) pkt_trk";
    
    protected $pakets2 = "(select DATE_FORMAT( paket.pkt_tgl_buat , '%y/%m' ) AS bulan,
count(paket.id_paket) AS jumlah,
paket.id_satker 
from paket
group by 
bulan,id_satker ) pkt_trk";


    public function get_count_paket(){
        $dep = $this->ion_auth->get_users_department($this->ion_auth->get_user_id())->row();
        $this->db->select('paket.*');
        $this->db->from('paket');
        
        if (!empty($dep)) {
            $this->db->where(array('paket.id_satker' => $dep->id_satker));
        }        
        return $this->db->get()->result();
    }
    
    public function get_count_kontrak(){
        $dep = $this->ion_auth->get_users_department($this->ion_auth->get_user_id())->row();
        $this->db->select('paket.*,kontrak.id_kontrak');
        $this->db->from('paket');
        $this->db->join('kontrak','paket.id_paket = kontrak.id_paket','right');
        if (!empty($dep)) {
            $this->db->where(array('paket.id_satker' => $dep->id_satker));
        }   
        return $this->db->get()->result();
    }
    
    public function get_count_nilai(){
        $dep = $this->ion_auth->get_users_department($this->ion_auth->get_user_id())->row();
        $this->db->select('paket.*,kontrak.id_kontrak,penilaian.id_nilai');
         $this->db->from('paket');
        $this->db->join('kontrak','paket.id_paket = kontrak.id_paket','right');
        $this->db->join('penilaian','penilaian.id_kontrak = kontrak.id_kontrak','right');
        if (!empty($dep)) {
            $this->db->where(array('paket.id_satker' => $dep->id_satker));
        }   
        return $this->db->get()->result();
    }
    
    public function tracked(){
        $dep = $this->ion_auth->get_users_department($this->ion_auth->get_user_id())->row();
        $this->db->select('bulans.bulan,COALESCE(pkt_trk.jumlah,0) as jmlh_pkt');
        $this->db->from($this->bulan);
         if (!empty($dep)) {
            $this->db->join($this->pakets2,'bulans.bulan = pkt_trk.bulan','left');
            $this->db->where(array('pkt_trk.id_satker' => $dep->id_satker));
        }else{
            $this->db->join($this->pakets,'bulans.bulan = pkt_trk.bulan','left');
        }
        $this->db->order_by('bulans.bulan', 'ASC');
        return $this->db->get()->result();
    }
}
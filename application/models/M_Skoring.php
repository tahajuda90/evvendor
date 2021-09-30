<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Skoring extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Paket','M_Kontrak','M_Rekanan','M_KlasIdktr'));
    }
    
    function get_paket(){
        $this->db->select('kontrak.id_kontrak,rekanan.rkn_nama,penilaian.total_nilai,penilaian.rating_nilai');
        $this->M_Paket->child($this->M_Paket->table, $this->M_Kontrak->table, $this->M_Paket->primary);
        $this->db->where($this->M_Kontrak->table.'.id_kontrak IS NOT NULL AND '.$this->M_Kontrak->table.'.id_rekanan IS NOT NULL');
        $this->db->join($this->M_Rekanan->table,$this->M_Kontrak->table.'.id_rekanan = '.$this->M_Rekanan->table.'.id_rekanan','LEFT');
        $this->db->join('penilaian','kontrak.id_kontrak = penilaian.id_kontrak','LEFT');
        return $this->M_Paket->get_all(true);
    }
    
    function get_indikator($id_kontrak){
        $nilai = '(SELECT * from penilaian_detail pd where pd.id_kontrak = '.$id_kontrak.') as n';
        $kontrak = $this->M_Kontrak->get_by_id($id_kontrak);
        $paket = $this->M_Paket->get_by_id($kontrak->id_paket);
        $this->db->select('n.id_detail,group_penilaian.nama_group,indikator_penilaian.nama_indikator,kualifikasi_indikator.bobot,kualifikasi_indikator.active,n.nilai ');
        $this->db->from('kualifikasi_indikator');
        $this->db->join('indikator_penilaian','indikator_penilaian.id_indikator = kualifikasi_indikator.id_indikator','left');
        $this->db->join('group_penilaian','group_penilaian.id_group = indikator_penilaian.id_group','left');
        $this->db->join($nilai,'n.id_indikator = indikator_penilaian.id_indikator','right');
        $this->db->where(array('kualifikasi_indikator.id_kualifikasi'=>$paket->id_kualifikasi));
        return $this->db->get()->result();
    }
    
    
    private function calculate(){
        
    }
    
}
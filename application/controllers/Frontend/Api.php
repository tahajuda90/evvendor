<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Frontend/M_Status','Frontend/M_Report'));
    }
    
        
    public function rekap_grafik($tahun=null){
        $hasil = array(
            'tahun' =>array_column($this->M_Status->rekap_status_tender($tahun), 'tahun'),
            'paket' => array_map('intval',array_column($this->M_Status->rekap_status_tender($tahun), 'paket')),
            'ulang' => array_map('intval',array_column($this->M_Status->rekap_status_tender($tahun), 'ulang')),
            'gagal' => array_map('intval',array_column($this->M_Status->rekap_status_tender($tahun), 'gagal')),
        );
        echo json_encode($hasil);
    }
    
    public function resume($tahun=null){
        $index = count($this->M_Status->rekap_status_tender())-1;
        if($tahun){
           $index = array_keys(array_column($this->M_Status->rekap_status_tender(),'tahun'),$tahun)[0]; 
        }
        $now =  $this->M_Status->rekap_status_tender()[$index];
        if($index == 0){
            $before = $this->M_Status->rekap_status_tender()[$index]; 
        }else{
            $before = $this->M_Status->rekap_status_tender()[$index-1]; 
        }        
        $hasil = array(
            'paket' => array('tahun' => $now->tahun,
                'jmlh' => $now->paket,
                'prosentase' => prosentase(abs($now->paket - $before->paket), $before->paket),
                'sebelum' => $before->paket),
            'ulang' => array('tahun' => $now->tahun,
                'jmlh' => $now->ulang,
                'prosentase' => prosentase(abs($now->ulang - $before->ulang), $before->ulang),
                'sebelum' => $before->ulang),
            'gagal' => array('tahun' => $now->tahun,
                'jmlh' => $now->gagal,
                'prosentase' => prosentase(abs($now->gagal - $before->gagal), $before->gagal),
                'sebelum' => $before->gagal)
        );
        print_r(json_encode($hasil));
    }
    
    public function rekap_grafik_non($tahun=null){
        $hasil = array(
            'tahun' => array_column($this->M_Status->rekap_status_nontender($tahun), 'tahun'),
            'paket' => array_map('intval',array_column($this->M_Status->rekap_status_nontender($tahun), 'paket')),
            'ulang' => array_map('intval',array_column($this->M_Status->rekap_status_nontender($tahun), 'ulang')),
            'gagal' => array_map('intval',array_column($this->M_Status->rekap_status_nontender($tahun), 'gagal')),
        );
        echo json_encode($hasil);
    }
    
        public function resume_non($tahun=null){
        $index = count($this->M_Status->rekap_status_nontender())-1;
        if($tahun){
           $index = array_keys(array_column($this->M_Status->rekap_status_nontender(),'tahun'),$tahun)[0]; 
        }
        $now =  $this->M_Status->rekap_status_nontender()[$index];
        if($index == 0){
            $before = $this->M_Status->rekap_status_nontender()[$index]; 
        }else{
            $before = $this->M_Status->rekap_status_nontender()[$index-1]; 
        }        
        $hasil = array(
            'paket' => array('tahun' => $now->tahun,
                'jmlh' => $now->paket,
                'prosentase' => prosentase(abs($now->paket - $before->paket), $before->paket),
                'sebelum' => $before->paket),
            'ulang' => array('tahun' => $now->tahun,
                'jmlh' => $now->ulang,
                'prosentase' => prosentase(abs($now->ulang - $before->ulang), $before->ulang),
                'sebelum' => $before->ulang),
            'gagal' => array('tahun' => $now->tahun,
                'jmlh' => $now->gagal,
                'prosentase' => prosentase(abs($now->gagal - $before->gagal), $before->gagal),
                'sebelum' => $before->gagal)
        );
        print_r(json_encode($hasil));
    }
}
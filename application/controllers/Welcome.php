<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Integrasi/M_ISatker','Integrasi/M_IPaket','Integrasi/M_IPpk','M_Paket'));
    }
	public function index()
	{
//            $db2 = $this->load->database('postgre://postgres:3april2014@localhost/simponi', TRUE);
//            $q =$db2->get('taha_paket_tender'); 
//            if(!$q){
//                print_r('errorr');
//            }else{
//                var_dump($q->result());
//            }
//        print_r($this->M_IPaket->get_cond(array('lls_id'=>2500590)));
//        print_r($this->M_ISatker->all());        
//        print_r($this->M_ISatker->save(563590));
            
		//$this->load->view('welcome_message');
//                print_r(load_menu()['penilaian']);
        var_dump(strpos('2022-06-28', ' ') );
    }
    
    public function coba(){
//        $url="https://inaproc.id/daftar-hitam?provinsi=&keyword=02.931.517.3-128.000";
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_CONNECTTIMEOUT=>10,
//            CURLOPT_TIMEOUT=>10,
//            CURLOPT_URL=>$url,
//            CURLOPT_RETURNTRANSFER => TRUE
//        ));
//        
//        $respn = curl_exec($curl);
////        var_dump($respn);
//        
//        if($respn==FALSE){
//
//            return $respn;
//
//        }else{
//             $dom = new DOMDocument();
//
//            libxml_use_internal_errors(true);
//
//            $dom->loadHTML($respn);
//
//            libxml_use_internal_errors(false);
//            
//            $xpath = new DOMXPath($dom);
//            var_dump($xpath->query("//script/text()[contains(.,'daftarHitamCollection')]")->item(0)->nodeValue) ;
//            
//        }
        print_r($this->M_IPpk->tarik());
    }
}

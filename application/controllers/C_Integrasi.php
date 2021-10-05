<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Integrasi extends CI_Controller{
    var $sess =null;
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Integrasi/M_ISatker','Integrasi/M_IBentukU','Integrasi/M_IPaket','Integrasi/M_IKontrak','Integrasi/M_IRekanan',
            'Integrasi/M_IRius','Integrasi/M_IRakta','Integrasi/M_IRpjk','Integrasi/M_IRpml','Integrasi/M_IRpgr','Integrasi/M_IRpgl','Integrasi/M_IRahli','Integrasi/M_IRprl'));
        $this->sess = $this->session->get_userdata();
    }
    
    public function satker(){
        if($this->M_ISatker->is_online()){
        $data['stkr']=$this->M_ISatker->all();
        $data['page'] = 'page/IntegrasiSatuanKerja';
        //var_dump(property_exists($data['stkr'][0], "id_satker"));
        $this->load->view('Main_v',$data);
        }else{
            show_404();
        }
    }
    
    public function satker_save($stk){
        if($this->M_ISatker->save($stk)){
            redirect($this->sess['last_url']);
        }else{
            redirect($this->sess['last_url']);
        }
        //redirect() ke C_SatuanKerja/index dengan session message didalam if;
    }
    
    public function bentukU_save(){
        if($this->M_IBentukU->is_online()){
            print_r($this->M_IBentukU->save());
        }else{
            show_404();
        }
    }
    
    public function paket(){
        $llg = $this->input->post('lls_id');
        $pkt = $this->M_IPaket->by_id('lls_id',$llg);
        if ($this->M_IPaket->is_online()) {
            if ($this->M_IPaket->satker_check($llg)) {
                $data['title'] = $pkt->stk_nama;
                $data['body'] = "Tahun : " . $pkt->tahun . "<br><b>" . $pkt->pkt_nama . "</b><br> Pagu : " . rupiah($pkt->pkt_pagu) . "<br>" .
                        ($pkt->status == 1 ? 'Non-Tender' : 'Tender')
                ;
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('C_Integrasi/paket_save/').$pkt->pkt_id.'" type="button">Tarik</a>';
            } else if(isset($pkt)){
                $data['title'] = $pkt->stk_nama;
                $data['body'] = 'Data opd belum di integrasikan klik tombol integrasi untuk melanjutkan dan ulangi tarik paket';
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('C_Integrasi/satker_save/').$pkt->stk_id.'" type="button">Integrasi</a>';
            } else {
                $data['title'] = 'Paket Tidak Ditemukan';
                $data['body'] = 'Kode tender yang anda masukan tidak sesuai <br> Pastikan data LPSE terupdate / klik tombol dibawah ini untuk membuat paket secara manual';
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('C_PaketKontrak/create').'" type="button">Buat Paket</a>';
                //jangan lupa href disamakan dengan routes
            }
        }else{
            $data['title'] = 'Data Tidak Terhubung';
            $data['body'] = 'Data LPSE Tidak Terhubung Pada Sistem';
            $data['button'] = '';
        }
        $this->load->view('component/modal',$data);
    }
    
    public function paket_save($id){
        if($this->M_IPaket->save($id)){
            redirect($this->sess['last_url']);
        }else{
            redirect($this->sess['last_url']);
        }
        //redirect() ke C_PaketKontrak/index dengan session message didalam if;
    }
    public function kontrak_save($id_pkt){
        if($this->M_IKontrak->is_online()){
            if($this->M_IKontrak->save($id_pkt)){
                redirect($this->sess['last_url']);
            }else{
                redirect(base_url('paket/kontrak/create/'.$id_pkt));
            }
        }else{
            redirect(base_url('paket/kontrak/create/'.$id_pkt));
        }
        //redirect() ke C_PaketKontrak/index dengan session message didalam if;
    }
    
    public function status_penyedia(){
        //$npwp = '92.493.425.0-622.000';
        //$rknid = '279590';
//        else if ($this->M_IRekanan->by_id('rkn_id', $this->input->get('rkn_id'))) {
//                $rkn = $this->M_IRekanan->by_id('rkn_id', $this->input->get('rkn_id'));
//                $data['title'] = $rkn->rkn_nama;
//                $data['body'] = '<b>Bentuk Usaha :</b> '.$rkn->btu_nama
//                        .'<br><b>NPWP :</b> '.$rkn->rkn_npwp.'<br>'.$rkn->rkn_alamat.'<br> <b>Asal Kota/Kabupaten :</b> '.$rkn->kbp_nama;
//                $data['button'] = '';
//            }
        if($this->M_IRekanan->is_online()){
            if($this->M_IRekanan->by_id('rkn_npwp', $this->input->get('npwp'))) {
                $rkn = $this->M_IRekanan->by_id('rkn_npwp', $this->input->get('npwp'));
                $data['title'] = $rkn->rkn_nama;
                $data['body'] = '<b>Bentuk Usaha :</b> '.$rkn->btu_nama
                        .'<br><b>NPWP :</b> '.$rkn->rkn_npwp.'<br>'.$rkn->rkn_alamat.'<br> <b>Asal Kota/Kabupaten :</b> '.$rkn->kbp_nama;
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('C_Integrasi/penyedia_save/').$rkn->rkn_id.'" type="button">Tarik</a>';
            } else{
                $data['title'] = 'Penyedia Tidak Ditemukan';
                $data['body'] = 'Pastikan Penyedia Terdapat Pada Sistem LPSE';
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('rekanan/create').'" type="button">Buat Paket</a>';
            }
        }else{
            $data['title'] = 'Data Tidak Terhubung';
            $data['body'] = 'Data LPSE Tidak Terhubung Pada Sistem';
            $data['button'] = '';
        }
        $this->load->view('component/modal',$data);
        
    }
    
    public function penyedia_save($rkn_id){
        if($this->M_IRekanan->save($rkn_id)){
            redirect($this->sess['last_url']);
        }else{
            redirect($this->sess['last_url']);
        };
    }
    
    public function penyedia(){
        if($this->input->get('npwp')){
            $rkn_id = array('kolom'=>'rkn_npwp','value'=>$this->input->get('npwp'));
        }else{
            $rkn_id = array('kolom'=>'rkn_id','value'=>$this->input->get('rkn_id'));
        } 
        if($this->M_IRekanan->is_online()){
            $rkn = $this->M_IRekanan->status($rkn_id)['online'];
            $rknof = $this->M_IRekanan->status($rkn_id)['lokal'];
            if(!empty($rkn) && empty($rknof)){
                $data['title'] = $rkn->rkn_nama;
                $data['body'] = '<b>Bentuk Usaha :</b> ' . $rkn->btu_nama
                        . '<br><b>NPWP :</b> ' . $rkn->rkn_npwp . '<br>' . $rkn->rkn_alamat . '<br> <b>Asal Kota/Kabupaten :</b> ' . $rkn->kbp_nama;
                $data['button'] = '<a class="btn btn-primary" href="' . base_url('C_Integrasi/penyedia_save/').$rkn->rkn_id.'" type="button">Tarik</a>';
            }else if(!empty($rknof) && $this->input->get('kontrak')){
                
                $data['title'] = $rknof[0]->rkn_nama;
                $data['body'] = '<b>Bentuk Usaha :</b> ' . $rknof[0]->btu_nama
                        . '<br><b>NPWP :</b> ' . $rknof[0]->rkn_npwp . '<br>' . $rknof[0]->rkn_alamat . '<br> <b>Asal Kota/Kabupaten :</b> ' . $rknof[0]->kbp;
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('C_PaketKontrak/assign_penyedia?id_kontrak='.$this->input->get('kontrak').'&id_rekanan='.$rknof[0]->id_rekanan).'" type="button">Pilih</a>';
            }else if(!empty($rkn) && !empty($rknof)){
                $data['title'] = $rknof[0]->rkn_nama;
                $data['body'] = '<b>Bentuk Usaha :</b> ' . $rknof[0]->btu_nama
                        . '<br><b>NPWP :</b> ' . $rknof[0]->rkn_npwp . '<br>' . $rknof[0]->rkn_alamat . '<br> <b>Asal Kota/Kabupaten :</b> ' . $rknof[0]->kbp;
                $data['button'] = '<a class="btn btn-primary" type="button" href="' . base_url('C_Integrasi/sinkron_penyedia/').$rknof[0]->rkn_npwp. '">Integrasi</a>';
            }else if(empty($rkn) && !empty($rknof)){
                $data['title'] = $rknof[0]->rkn_nama;
                $data['body'] = '<b>Bentuk Usaha :</b> ' . $rknof[0]->btu_nama
                        . '<br><b>NPWP :</b> ' . $rknof[0]->rkn_npwp . '<br>' . $rknof[0]->rkn_alamat . '<br> <b>Asal Kota/Kabupaten :</b> ' . $rknof[0]->kbp;
                $data['button'] = '';
            }else{
                $data['title'] = 'Penyedia Tidak Ditemukan';
                $data['body'] = 'Pastikan Penyedia Terdapat Pada Sistem LPSE';
                $data['button'] = '<a class="btn btn-primary" href="'.base_url('rekanan/create').'" type="button">Buat Paket</a>';
            }
        }else{
            $data['title'] = 'Data Tidak Terhubung';
            $data['body'] = 'Data LPSE Tidak Terhubung Pada Sistem';
            $data['button'] = '<a class="btn btn-primary" href="'.base_url('rekanan/create').'" type="button">Buat Paket</a>';
        }
        $this->load->view('component/modal',$data);
    }
    
    public function sinkron_penyedia($npwp){
         if($this->M_IRekanan->sinkron($npwp)){
            redirect($this->sess['last_url']);
        }else{
            redirect($this->sess['last_url']);
        };
    }
    
    public function ius_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRius->is_online()){
            if($this->M_IRius->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/ius/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/ius/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function akt_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRakta->is_online()){
            if($this->M_IRakta->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/akt/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/akt/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function pjk_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRpjk->is_online()){
            if($this->M_IRpjk->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/pjk/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/pjk/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function pml_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRpml->is_online()){
            if($this->M_IRpml->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/pml/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/pml/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function pgr_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRpgr->is_online()){
            if($this->M_IRpgr->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/pgr/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/pgr/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function pgl_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRpgl->is_online()){
            if($this->M_IRpgl->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/pgl/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/pgl/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function ahl_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRahli->is_online()){
            if($this->M_IRahli->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/ahl/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/ahl/'.$rkn[0]->id_penyedia);
        }
    }
    
    public function prl_penyedia($rkn_id){
        $rkn = $this->M_IRekanan->status(array('kolom'=>'rkn_id','value'=>$rkn_id))['lokal'];
        if($this->M_IRprl->is_online()){
            if($this->M_IRprl->save($rkn_id)){
                redirect($this->sess['last_url']);
            }else{
                redirect('rekanan/detail/prl/'.$rkn[0]->id_penyedia);
            }
        }else{
            redirect('rekanan/detail/prl/'.$rkn[0]->id_penyedia);
        }
    }
}


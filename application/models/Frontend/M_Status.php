<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Status extends MY_Integrate{
    public function __construct() {
        parent::__construct();
    }
    
    public function tender_gagal(){
        $q = $this->db->query("select date_part('year'::text, tst.pkt_tgl_buat) as tahun, 
count(tst.lls_id) as jumlah 
from taha_status_tender tst 
where tst.lls_ditutup_karena notnull 
group by tahun 
order by tahun DESC");
        return $q->result();
    }
    
    public function tender_ulang(){
        $q = $this->db->query("select date_part('year'::text, tst.pkt_tgl_buat) as tahun, 
count(tst.lls_id) as jumlah 
from taha_status_tender tst 
where tst.lls_diulang_karena notnull 
group by tahun 
order by tahun DESC");
        return $q->result();
    }
    
    public function total_status(){
        $q = $this->db->query("select 
sum(case when tst.lls_ditutup_karena is null then 1 else 0 end) as paket,
sum(
        CASE
            WHEN tst.lls_ditutup_karena IS NOT NULL THEN 1
            ELSE 0
        END) AS gagal,
    sum(
        CASE
            WHEN tst.lls_diulang_karena IS NOT NULL THEN 1
            ELSE 0
        END) AS ulang
        from taha_status_tender tst");
        return $q->result();
    }
    
    public function rekap_status() {
        $q = $this->db->query("SELECT date_part('year'::text, tst.pkt_tgl_buat) AS tahun,
	sum(case
		when tst.lls_ditutup_karena is null then 1
		else 0
		end
	) as paket,
    sum(
        CASE
            WHEN tst.lls_ditutup_karena IS NOT NULL THEN 1
            ELSE 0
        END) AS gagal,
    sum(
        CASE
            WHEN tst.lls_diulang_karena IS NOT NULL THEN 1
            ELSE 0
        END) AS ulang
   FROM taha_status_tender tst
  GROUP BY (date_part('year'::text, tst.pkt_tgl_buat))
  ORDER BY (date_part('year'::text, tst.pkt_tgl_buat)) DESC;");
        return $q->result();
    }
}
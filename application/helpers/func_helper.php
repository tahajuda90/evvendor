<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function fdatetodb($x){
		return date('Y-m-d',strtotime($x));
	}
	function fdatetimetodb($x){
		return date('Y-m-d H:i:s',strtotime($x));
	}
	function fdate($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d-m-Y',strtotime($x));
	}
	function fdatebulan($bln){
		$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$result = $BulanIndo[(int) $bln - 1] ;
		return $result;
	}
	function fdateindo($x){
		$dt = date('Y-m-d',strtotime($x));
		$tm = date('H:i:s',strtotime($x));
		$time = $tm=='00:00:00'?'':date(' h:i A',strtotime($tm));
		$bulan = array (1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split = explode('-', $dt);
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].$time;
	}
	function fdatetime($x){
		if($x=='' || $x==null || $x=='0000-00-00' || $x=='0000-00-00 00:00:00')
			return '';
		else
			return date('d/m/Y h:i A',strtotime($x));
	}
	function fdateformat($format,$x){
		return date($format,strtotime($x));
	}
	
	function diffdate($datetime,$fix=null, $full = false) {
		if($fix==null)$fix=date('Y-m-d H:i:s');
		$now = new DateTime($fix);
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;

		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . '.' : 'just now';
	}
        function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
        }
        
        function load_menu($group=null){
            $menu = [];
            
            $menu['dashboard']['menu']='Dashboard';
            $menu['dashboard']['ikon'] = '<i class="fa fa-dashboard"></i>';
            $menu['dashboard']['link'] = 'home';
            if($group == 'admin'){
            $menu['user']['menu']='Manajemen User';
            $menu['user']['ikon'] = '<i class="app-menu__icon fa fa-user-o"></i>';
            $menu['user']['sub']['user'] = 'User';
            }
            if(($group == 'admin') OR ($group == 'members')){
            $menu['penilaian']['menu']='Indikator Penilaian';
            $menu['penilaian']['ikon'] = '<i class="app-menu__icon fa fa-tasks"></i>';
            $menu['penilaian']['sub']['group'] = 'Aspek Penilaian';
            $menu['penilaian']['sub']['kualifikasi'] = 'Kualifikasi Pekerjaan';
            
            $menu['master']['menu']='Master';
            $menu['master']['ikon'] = '<i class="app-menu__icon fa fa-bars"></i>';
            $menu['master']['sub']['satker']='Satuan Kerja';
            $menu['master']['sub']['bntkusaha']='Bentuk Usaha';
            $menu['master']['sub']['metode']='Metode Pemilihan';
            $menu['master']['sub']['paket']='Paket Pekerjaan';
            
            $menu['perusahaan']['menu']='Perusahaan';
            $menu['perusahaan']['ikon'] = '<i class="app-menu__icon fa fa-building-o"></i>';
            $menu['perusahaan']['link'] = 'rekanan';
            
            $menu['skor']['menu']='Penilaian';
            $menu['skor']['ikon'] = '<i class="app-menu__icon fa fa-bar-chart"></i>';
            $menu['skor']['link']='penilaian';}
            
            return $menu;
        }

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['tender'] = 'C_Home/index';
$route['nontender'] = 'C_Home/nontender';
$route['rangking'] = 'C_Home/rangking';

$route['group'] = 'C_IndikatorNilai/index';
$route['group/indikator/(:any)'] = 'C_IndikatorNilai/index_ind/$1';
$route['group/update/(:any)'] = 'C_IndikatorNilai/update/$1';
$route['group/indikator/update/(:any)'] = 'C_IndikatorNilai/update_ind/$1';

$route['kualifikasi'] = 'C_Klasifikasi/index';
$route['kualifikasi/group/(:any)'] = 'C_Klasifikasi/index_grp/$1';
$route['kualifikasi/indikator/(:any)/(:any)'] = 'C_Klasifikasi/index_ind/$1/$2';
$route['kualifikasi/create'] = 'C_Klasifikasi/create';
$route['kualifikasi/update/(:any)'] = 'C_Klasifikasi/update/$1';
$route['kualifikasi/penilaian'] = 'C_IndikatorNilai/bridging';

$route['metode'] = 'C_Metode/index';
$route['metode/update/(:any)'] = 'C_Metode/update/$1';

$route['satker'] = 'C_SatuanKerja/index';
$route['satker/create'] = 'C_SatuanKerja/create';
$route['satker/update/(:any)'] = 'C_SatuanKerja/update/$1';
$route['satker/integrasi'] = 'C_Integrasi/satker';

$route['ppk'] = 'C_Ppk/index';

$route['paket'] = 'C_PaketKontrak/index';
$route['paket/kontrak/(:any)'] = 'C_PaketKontrak/index_ktr/$1';
$route['paket/create'] = 'C_PaketKontrak/create';
$route['paket/kontrak/create/(:any)'] = 'C_PaketKontrak/create_ktr/$1';
$route['paket/update/(:any)'] = 'C_PaketKontrak/update/$1';
$route['paket/kontrak/update/(:any)'] = 'C_PaketKontrak/update_ktr/$1';

$route['live/tender'] = 'C_Integrasi/pkt_lpse/0';
$route['live/nontender'] = 'C_Integrasi/pkt_lpse/1';

$route['bntkusaha'] = 'C_BtUsaha/index';
$route['bntkusaha/update/(:any)'] = 'C_BtUsaha/update/$1';

$route['rekanan'] = 'C_Rekanan/index';
$route['rekanan/create'] = 'C_Rekanan/create';
$route['rekanan/update/(:any)'] = 'C_Rekanan/update/$1';
$route['rekanan/detail/(:any)'] = 'C_RknDetail/Rekanan/$1';
$route['rekanan/detail/ius/(:any)'] = 'C_RknDetail/create_ius/$1';
$route['rekanan/detail/akt/(:any)'] = 'C_RknDetail/create_akt/$1';
$route['rekanan/detail/pjk/(:any)'] = 'C_RknDetail/create_pjk/$1';
$route['rekanan/detail/pml/(:any)'] = 'C_RknDetail/create_pml/$1';
$route['rekanan/detail/pgr/(:any)'] = 'C_RknDetail/create_pgr/$1';
$route['rekanan/detail/pgl/(:any)'] = 'C_RknDetail/create_pgl/$1';
$route['rekanan/detail/ahl/(:any)'] = 'C_RknDetail/create_ahl/$1';
$route['rekanan/detail/prl/(:any)'] = 'C_RknDetail/create_prl/$1';


$route['penilaian'] = 'C_Skoring/index';
$route['penilaian/create/(:any)'] = 'C_Skoring/skorcreate/$1';
$route['penilaian/update/(:any)'] = 'C_Skoring/skorupdate/$1';


$route['user'] = 'C_User/index';
$route['user/create'] = 'C_User/create_user';
$route['user/update/(:any)'] = 'C_User/edit_user/$1';
$route['user/passwd'] = 'C_User/change_password';
$route['user/satker/(:any)'] = 'C_User/assign_department/$1';
$route['login'] = 'C_User/login';

$route['home'] = 'C_Dashboard/index';
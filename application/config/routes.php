<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['group'] = 'C_IndikatorNilai/index';
$route['group/indikator/(:any)'] = 'C_IndikatorNilai/index_ind/$1';
$route['group/update/(:any)'] = 'C_IndikatorNilai/update/$1';
$route['group/indikator/update/(:any)'] = 'C_IndikatorNilai/update_ind/$1';

$route['kualifikasi'] = 'C_Klasifikasi/index';
$route['kualifikasi/indikator/(:any)'] = 'C_Klasifikasi/index_ind/$1';
$route['kualifikasi/create'] = 'C_Klasifikasi/create';
$route['kualifikasi/update/(:any)'] = 'C_Klasifikasi/update/$1';
$route['kualifikasi/penilaian'] = 'C_IndikatorNilai/bridging';

$route['satker'] = 'C_SatuanKerja/index';
$route['satker/create'] = 'C_SatuanKerja/create';
$route['satker/update/(:any)'] = 'C_SatuanKerja/update/$1';
$route['satker/integrasi'] = 'C_Integrasi/satker';

$route['paket'] = 'C_PaketKontrak/index';
$route['paket/kontrak/(:any)'] = 'C_PaketKontrak/index_ktr/$1';
$route['paket/create'] = 'C_PaketKontrak/create';
$route['paket/kontrak/create/(:any)'] = 'C_PaketKontrak/create_ktr/$1';
$route['paket/update/(:any)'] = 'C_PaketKontrak/update/$1';
$route['paket/kontrak/update/(:any)'] = 'C_PaketKontrak/update_ktr/$1';

$route['bntkusaha'] = 'C_BtUsaha/index';
$route['bntkusaha/update/(:any)'] = 'C_BtUsaha/update/$1';

$route['rekanan'] = 'C_Rekanan/index';
$route['rekanan/create'] = 'C_Rekanan/create';
$route['rekanan/update/(:any)'] = 'C_Rekanan/update/$1';
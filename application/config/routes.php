<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Auth';
//auth
$route['login'] = 'auth';
$route['logout'] = 'auth/logout';

//admin
$route['admin'] = 'admin/home';
$route['profile'] = 'admin/Profile';
$route['edit-profile'] = 'admin/Profile/profile';
$route['data-pegawai'] = 'admin/DataPegawai';
$route['save-pegawai']  = 'admin/DataPegawai/savePegawai';
$route['add-pegawai'] = 'admin/DataPegawai/addPegawai';
$route['edit-pegawai/(:any)'] = 'admin/EditPegawai/index/$1';
$route['data-kapal'] = 'admin/DataKapal';
$route['add-kapal'] = 'admin/DataKapal/addKapal';
$route['edit-kapal/(:any)'] = 'admin/EditKapal/index/$1';
$route['cert'] = 'admin/CertKapal';
$route['foto-kapal'] = 'admin/fotoKapal';
$route['foto-download'] = 'admin/fotoKapal/downloadFoto';
//lap
$route['on-going'] = 'admin/LapOnGoing';
$route['lap-expired'] = 'admin/LapExpired';
$route['lap-deleted'] = 'admin/LapDeleted';

$route['lap-bulanan'] = 'admin/LapBulanan';

//operasional
$route['operasional'] = 'operasional/home';
$route['op/profile'] = 'operasional/Profile';
$route['op/data-pegawai'] = 'operasional/DataPegawai';
$route['op/cert'] = 'operasional/CertKapal';
$route['op/foto-kapal'] = 'operasional/fotoKapal';
//lap
$route['op/on-going'] = 'operasional/LapOnGoing';
$route['op/lap-expired'] = 'operasional/LapExpired';
$route['op/lap-deleted'] = 'operasional/LapDeleted';

$route['op/lap-bulanan'] = 'operasional/lapBulanan';

//Kepala Cabang
$route['kecab'] = 'kecab/home';
$route['kc/profile'] = 'kecab/Profile';
$route['kc/data-pegawai'] = 'kecab/DataPegawai';
$route['kc/data-kapal'] = 'kecab/DataKapal';
$route['kc/cert'] = 'kecab/CertKapal';
$route['kc/foto-kapal'] = 'kecab/fotoKapal';
$route['kc/lap-bulanan'] = 'kecab/lapBulanan';
//lap
$route['kc/on-going'] = 'kecab/LapOnGoing';
$route['kc/lap-expired'] = 'kecab/LapExpired';
$route['kc/lap-deleted'] = 'kecab/LapDeleted';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

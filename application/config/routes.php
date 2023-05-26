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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// layanan
$route['layanan/(:num)'] = 'LayananController/index/$1';
$route['layanan/(:any)'] = 'LayananController/single_post/$1';
// end layanan

// tentang kami
$route['tentang-kami'] = 'TentangKamiController';
// end tentang kami

// kontak kami
$route['kontak-kami'] = 'KontakKamiCotroller';
$route['post_message'] = 'KontakKamiCotroller/post_message';
// end kontak kami

// galeri
$route['galeri'] = 'GaleriController';
// 


// ADMIN
// auth
$route['dek-admin-login'] = 'admin/AuthController';
$route['dek-admin-login/login'] = 'admin/AuthController/login';
$route['dek-admin-login/logout'] = 'admin/AuthController/logout';
// end auth

// dashboard
$route['dek-admin-login/dashboard'] = 'admin/DashboardController';
$route['dek-admin-login/send_email'] = 'admin/DashboardController/send_email';
// end dashboard

// perusahaan
$route['dek-admin-login/perusahaan'] = 'admin/PerusahaanController';
// end

// banner
$route['dek-admin-login/banner'] = 'admin/BannerController';
// end

// manage kategori layanan
$route['dek-admin-login/kategori-layanan'] = 'admin/KategoriLayananController';
$route['dek-admin-login/simpan-kategori-layanan'] = 'admin/KategoriLayananController/simpan_kategori';
$route['dek-admin-login/hapus-banner-kategori'] = 'admin/KategoriLayananController/hapus_banner_kategori';
$route['dek-admin-login/upload-banner-kategori'] = 'admin/KategoriLayananController/upload_banner_kategori';
$route['dek-admin-login/ubah-kategori'] = 'admin/KategoriLayananController/ubah_kategori';
// end manage kategori layanan

// manage layanan
$route['dek-admin-login/layanan'] = 'admin/LayananController';
$route['dek-admin-login/simpan-layanan'] = 'admin/LayananController/simpan_layanan';
$route['dek-admin-login/tampil-layanan'] = 'admin/LayananController/show_layanan';
$route['dek-admin-login/ubah-layanan'] = 'admin/LayananController/ubah_layanan';
$route['dek-admin-login/hapus-layanan'] = 'admin/LayananController/hapus_layanan';
$route['dek-admin-login/upload-banner-layanan'] = 'admin/LayananController/upload_banner_layanan';
$route['dek-admin-login/hapus-banner-layanan'] = 'admin/LayananController/hapus_banner_layanan';
// end manage layanan

// manage galeri
$route['dek-admin-login/galeri'] = 'admin/GaleriController';
// end

// manage testimoni
$route['dek-admin-login/testimoni'] = 'admin/TestimoniController';
// end

// manage client
$route['dek-admin-login/client'] = 'admin/ClientController';
// end
// END ADMIN

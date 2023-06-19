<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['daftarUserEksternal'] = 'UserEksternalController/daftar';
$route['detailKegiatan/(:any)'] = 'UserEksternalController/detail/$1';
$route['kuesionerKegiatan/(:any)'] = 'UserEksternalController/detailKuesioner/$1';
$route['kuesionerKegiatanPresensi'] = 'UserEksternalController/presensi';

$route['login'] = 'LoginController';
$route['login/aksiLogin'] = 'LoginController/aksiLogin';
$route['logout'] = 'LoginController/logout';

$route['profil'] = 'LoginController/profil';
$route['profilUpdate'] = 'LoginController/updateProfil';

$route['dashboardAdmin'] = 'admin/DashboardAdminController';

$route['aturan'] = 'admin/AturanController';
$route['aturan/insert'] = 'admin/AturanController/insert';
$route['aturan/delete'] = 'admin/AturanController/delete';
$route['aturan/detail/(:any)'] = 'admin/AturanController/detail/$1';
$route['aturan/detailAturan/(:any)'] = 'admin/AturanController/detailAturan/$1';
$route['aturan/update'] = 'admin/AturanController/update';
$route['aturan/updateAturanAktif'] = 'admin/AturanController/updateAturanAktif';
$route['aturan/updateAturanMahasiswa'] = 'admin/AturanController/UpdateMultipleMahasiswa';

$route['jeniskegiatan'] = 'admin/JenisKegiatanController';
$route['jeniskegiatan/insert'] = 'admin/JenisKegiatanController/insert';
$route['jeniskegiatan/delete'] = 'admin/JenisKegiatanController/delete';
$route['jeniskegiatan/update/(:any)'] = 'admin/JenisKegiatanController/detail/$1';
$route['jeniskegiatan/update'] = 'admin/JenisKegiatanController/update';

$route['lingkupkegiatan'] = 'admin/LingkupKegiatanController';
$route['lingkupkegiatan/insert'] = 'admin/LingkupKegiatanController/insert';
$route['lingkupkegiatan/delete'] = 'admin/LingkupKegiatanController/delete';
$route['lingkupkegiatan/update/(:any)'] = 'admin/LingkupKegiatanController/detail/$1';
$route['lingkupkegiatan/update'] = 'admin/LingkupKegiatanController/update';

$route['perankegiatan'] = 'admin/PeranKegiatanController';
$route['perankegiatan/insert'] = 'admin/PeranKegiatanController/insert';
$route['perankegiatan/delete'] = 'admin/PeranKegiatanController/delete';
$route['perankegiatan/update/(:any)'] = 'admin/PeranKegiatanController/detail/$1';
$route['perankegiatan/update'] = 'admin/PeranKegiatanController/update';

$route['user'] = 'admin/UserController';
$route['user/insert'] = 'admin/UserController/insert';
$route['user/delete'] = 'admin/UserController/delete';
$route['user/update/(:any)'] = 'admin/UserController/detail/$1';
$route['user/update'] = 'admin/UserController/update';

$route['kegiatan'] = 'admin/KegiatanController';
$route['kegiatan/insert'] = 'admin/KegiatanController/insert';
$route['kegiatan/delete'] = 'admin/KegiatanController/delete';
$route['kegiatan/update/(:any)'] = 'admin/KegiatanController/detail/$1';
$route['kegiatan/update'] = 'admin/KegiatanController/update';
$route['kegiatan/acc'] = 'admin/KegiatanController/acc';
$route['kegiatan/tolak'] = 'admin/KegiatanController/tolak';
$route['kegiatan/detail/(:any)'] = 'admin/KegiatanController/detail/$1';

$route['tugaskhusus'] = 'admin/TugasKhususController';
$route['tugaskhusus/insert'] = 'admin/TugasKhususController/insert';
$route['tugaskhusus/delete'] = 'admin/TugasKhususController/delete';
$route['tugaskhusus/update/(:any)'] = 'admin/TugasKhususController/detail/$1';
$route['tugaskhusus/update'] = 'admin/TugasKhususController/update';
$route['tugaskhusus/acc'] = 'admin/TugasKhususController/acc';
$route['tugaskhusus/tolak'] = 'admin/TugasKhususController/tolak';
$route['tugaskhusus/detail/(:any)'] = 'admin/TugasKhususController/detail/$1';
$route['tugaskhusus/kegiatan/(:any)'] = 'admin/TugasKhususController/detailKegiatan/$1';

$route['riwayatTugasKhusus'] = 'admin/RiwayatTugasKhususController';
$route['riwayatTugasKhusus/detail/(:any)'] = 'admin/RiwayatTugasKhususController/detail/$1';
$route['riwayatTugasKhusus/kegiatan/(:any)'] = 'admin/RiwayatTugasKhususController/detailKegiatan/$1';

$route['nilai/insert'] = 'admin/AturanController/insertNilai';
$route['nilai/delete'] = 'admin/AturanController/deleteNilai';
$route['aturan/nilai/update/(:any)'] = 'admin/AturanController/detailNilai/$1';
$route['nilai/update'] = 'admin/AturanController/updateNilai';

$route['aturan/poin/(:any)'] = 'admin/AturanController/insertMultiplePoin/$1';
$route['aturan/ajxGetData'] = 'admin/AturanController/ajxGetDataMaster';
$route['poin/insert'] = 'admin/AturanController/insertPoin';
$route['poin/delete'] = 'admin/AturanController/deletePoin';
$route['aturan/poin/update/(:any)'] = 'admin/AturanController/detailPoin/$1';
$route['poin/update'] = 'admin/AturanController/updatePoin';

$route['aturan/nilai/kriteria/(:any)'] = 'admin/AturanController/kriteria/$1';
$route['kriteria/delete'] = 'admin/AturanController/deleteKriteria';
$route['aturan/nilai/kriteria/update/(:any)'] = 'admin/AturanController/detailKriteria/$1';
$route['kriteria/update'] = 'admin/AturanController/updateKriteria';
$route['aturan/poin/kriteria/insert/(:any)'] = 'admin/AturanController/insertMultipleKriteria/$1';
$route['kriteria/insert'] = 'admin/AturanController/insertKriteria';

//Event Manager Role

$route['dashboardEvent'] = 'eventManager/DashboardEventController';

$route['daftarEvent'] = 'eventManager/DaftarEventController';
$route['daftarEvent/insert'] = 'eventManager/DaftarEventController/insert';
$route['daftarEvent/delete'] = 'eventManager/DaftarEventController/delete';
$route['daftarEvent/update/(:any)'] = 'eventManager/DaftarEventController/viewUpdate/$1';
$route['daftarEvent/detail/(:any)'] = 'eventManager/DaftarEventController/detail/$1';
$route['daftarEvent/print/(:any)'] = 'eventManager/DaftarEventController/print/$1';
$route['daftarEvent/update'] = 'eventManager/DaftarEventController/aksiUpdate';
$route['daftarEvent/detailKuesioner/(:any)'] = 'eventManager/DaftarEventController/detailKuesioner/$1';

$route['kalenderEvent'] = 'eventManager/KalenderEventController';

//Kaprodi Role

$route['dashboardKaprodi'] = 'kaprodi/DashboardKaprodiController';
$route['daftarMahasiswa'] = 'kaprodi/KaprodiMahasiswaController';
$route['daftarMahasiswa/detail/(:any)'] = 'kaprodi/KaprodiMahasiswaController/detail/$1';
$route['daftarMahasiswa/kegiatan/(:any)'] = 'kaprodi/KaprodiMahasiswaController/detailKegiatan/$1';

// ======================= NEW =======================
$route['dashboardMahasiswa'] = 'mahasiswa/DashboardMahasiswaController';
$route['lowonganMahasiswa'] = 'mahasiswa/DaftarLowonganController';
$route['detailLowonganMahasiswa/detail/(:any)'] = 'mahasiswa/DaftarLowonganController/detail/$1';
$route['detailLowonganMahasiswa/daftar'] = 'mahasiswa/DaftarLowonganController/daftar';
$route['riwayatLamaran'] = 'mahasiswa/DaftarRiwayatController';
$route['absenMagangMahasiswa'] = 'mahasiswa/DaftarAbsenController';
$route['absenMagangMahasiswa/absen'] = 'mahasiswa/DaftarAbsenController/absen';
$route['absenMagangMahasiswa/hapus'] = 'mahasiswa/DaftarAbsenController/delete';
$route['bimbinganMahasiswa'] = 'mahasiswa/DaftarBimbinganController';
$route['bimbinganMahasiswa/bimbingan'] = 'mahasiswa/DaftarBimbinganController/bimbingan';
$route['bimbinganMahasiswa/laporanAkhir'] = 'mahasiswa/DaftarBimbinganController/uploadLaporanAkhir';
$route['bimbinganMahasiswa/detail/(:any)'] = 'mahasiswa/DaftarBimbinganController/detail/$1';

$route['dashboardDosen'] = 'dosen/DashboardDosenController';
$route['bimbinganDosen'] = 'dosen/DaftarBimbinganController';
$route['bimbinganDosen/detail/(:any)'] = 'dosen/DaftarBimbinganController/detailMahasiswa/$1';
$route['bimbinganDosen/mahasiswa/detail/(:any)'] = 'dosen/DaftarBimbinganController/detail/$1';
$route['bimbinganDosen/mahasiswa/update'] = 'dosen/DaftarBimbinganController/balasBimbingan';
$route['bimbinganDosen/mahasiswa/nilaiAkhir'] = 'dosen/DaftarBimbinganController/updateNilaiAKhir';

$route['dashboardPerusahaan'] = 'perusahaan/DashboardPerusahaanController';
$route['lowonganPerusahaan'] = 'perusahaan/DaftarLowonganController';
$route['lowonganPerusahaan/tambah'] = 'perusahaan/DaftarLowonganController/tambahLowongan';
$route['detailLowonganPerusahaan/detail/(:any)'] = 'perusahaan/DaftarLowonganController/detail/$1';
$route['lowonganPerusahaan/ubah'] = 'perusahaan/DaftarLowonganController/updateLowongan';
$route['daftarMahasiswaMagang'] = 'perusahaan/DaftarMahasiswaMagangController';
$route['daftarAbsenMahasiswaMagang'] = 'perusahaan/DaftarAbsenController';
$route['daftarAbsenMahasiswaMagang/validasi'] = 'perusahaan/DaftarAbsenController/updateStatus';

$route['dashboardAdmin'] = 'admin/DashboardAdminController';
$route['daftarPerusahaan'] = 'admin/DaftarPerusahaanController';
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserEksternalController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DaftarEventModel');
        $this->load->model('PresensiModel');
        $this->load->model('KuesionerModel');
        $this->load->model('TugasKhususModel');
        $this->load->model('KegiatanModel');
        
    }

    public function index()
    {
        $data['event'] = $this->DaftarEventModel->getActiveEvent();

        $this->load->view('template/header');
        $this->load->view('template/sidebarUserEksternal');
        $this->load->view('template/topbarUserEksternal');
        $this->load->view('userEksternal/DashboardUserEksternalView', $data);
        $this->load->view('template/footerUserEksternal');
    }

    public function detail($idEvent)
    {
        $data['detail_event']   = $this->DaftarEventModel->getDetail($idEvent);

        $this->load->view('template/header');
        $this->load->view('template/sidebarUserEksternal');
        $this->load->view('template/topbarUserEksternal');
        $this->load->view('userEksternal/DetailUserEksternalView', $data);
        $this->load->view('template/footerUserEksternal');
    }

    public function daftar()
    {
        $email          = $this->input->post('EMAIL');
        $nama           = $this->input->post('NAMA');
        $idEvent        = $this->input->post('ID_EVENT');

        if (strpos($email, "@mhs.stiki.ac.id")) {
            $isEksternal = 0;
        } else {
            $isEksternal = 1;
        }

        $dataPresensi = array(
            'EMAIL'            => $email,
            'NAMA'             => $nama,
            'ID_EVENT'         => $idEvent,
            'IS_EKSTERNAL'     => $isEksternal,
        );

        $where = array(
            'EMAIL'            => $email,
            'ID_EVENT'         => $idEvent
        );

        $presensi = $this->PresensiModel->getPresensi($where);
        if ($presensi == null) {
            $this->PresensiModel->insert($dataPresensi);
            $this->session->set_tempdata('daftar', '<div class="alert alert-success" role="alert">Anda berhasil mendaftar event ini</div>', 1);
        } else {
            $this->session->set_tempdata('daftar', '<div class="alert alert-warning" role="alert">Anda telah melakukan pendaftaran pada event ini</div>', 1);
        }

        redirect("detailKegiatan/" . $idEvent);
    }

    public function detailKuesioner($idEvent)
    {
        $data['detail_event']   = $this->DaftarEventModel->getDetail($idEvent);

        $this->load->view('template/header');
        $this->load->view('template/sidebarUserEksternal');
        $this->load->view('template/topbarUserEksternal');
        $this->load->view('userEksternal/KuesionerUserEksternalView', $data);
        $this->load->view('template/footerUserEksternal');
    }

    public function presensi()
    {
        $idEvent        = $this->input->post('ID_EVENT');
        $email          = $this->input->post('EMAIL');
        $jwb1          = $this->input->post('JAWABAN_1');
        $jwb2          = $this->input->post('JAWABAN_2');
        $jwb3          = $this->input->post('JAWABAN_3');
        $jwb4          = $this->input->post('JAWABAN_4');
        $jwb5          = $this->input->post('JAWABAN_5');
        $saran          = $this->input->post('SARAN');

        $kuesioner = array(
            'EMAIL'            => $email,
            'ID_EVENT'         => $idEvent,
            'JAWAB_1'         => $jwb1,
            'JAWAB_2'         => $jwb2,
            'JAWAB_3'         => $jwb3,
            'JAWAB_4'         => $jwb4,
            'JAWAB_5'         => $jwb5,
            'SARAN'         => $saran,
        );

        $where = array(
            'EMAIL'            => $email,
            'ID_EVENT'         => $idEvent
        );

        $presensi = $this->PresensiModel->getPresensi($where);
        if ($presensi != null) {
            if ($presensi['STATUS'] == 0) {
                $this->KuesionerModel->insert($kuesioner);

                $status = array(
                    'STATUS'             => 1
                );

                $this->PresensiModel->update($where, $status);

                if (strpos($email, "@mhs.stiki.ac.id")) {
                    $detailEvent = $this->DaftarEventModel->getDetail($idEvent);
                    if ($detailEvent != null) {
                        $dataTugasKhusus = array(
                            'NRP'                   => substr($email, 0, 9),
                            'ID_JENIS'              => $detailEvent[0]->ID_JENIS,
                            'ID_LINGKUP'            => $detailEvent[0]->ID_LINGKUP,
                            'ID_PERAN'              => 2,
                            'JUDUL'                 => $detailEvent[0]->JUDUL,
                            'TANGGAL_KEGIATAN'      => $detailEvent[0]->TANGGAL_ACARA,
                            'STATUS_VALIDASI'       => 1,
                            'TANGGAL_VALIDASI'      => date('Y-m-d H:i:s'),
                        );

                        $idTugasKhusus = $this->TugasKhususModel->insert($dataTugasKhusus);
                        if ($idTugasKhusus != null) {
                            $dataKegiatan = array(
                                'ID_TUGAS_KHUSUS'   => $idTugasKhusus,
                                'KETERANGAN'     => $detailEvent[0]->PEMBICARA
                            );
                            $this->KegiatanModel->insert($dataKegiatan);
                        }
                    }
                }

                $this->session->set_tempdata('presensi', '<div class="alert alert-success" role="alert">Anda berhasil melakukan presensi pada event ini</div>', 1);
            } else {
                $this->session->set_tempdata('presensi', '<div class="alert alert-warning" role="alert">Anda sebelumnya telah melakukan melakukan presensi pada event ini</div>', 1);
            }
        } else {
            $this->session->set_tempdata('presensi', '<div class="alert alert-danger" role="alert">Anda tidak terdaftar pada event ini</div>', 1);
        }

        redirect("kuesionerKegiatan/" . $idEvent);
    }
}
    
    /* End of file UserEksternalController.php */

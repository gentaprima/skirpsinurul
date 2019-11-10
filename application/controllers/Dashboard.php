<?php

require_once  $_SERVER['DOCUMENT_ROOT'].'/skripsinurul/vendor/autoload.php';
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;
 class Dashboard extends CI_Controller{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelPenduduk');
        $this->load->model('ModelBansos');
        if(!$this->session->userdata('login')){
            redirect(base_url());
        }

    }

    public function index(){
        $data['active_home'] = "active";
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/main');
        $this->load->view('layout/footer');
    }

    public function tambah_penerima(){
        $data['kelurahan'] = $this->db->get('tb_kelurahan')->result_array();
        $data['active_tambah'] = "active";
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/forms/tambah_penerima',$data);
        $this->load->view('layout/footer');
    } 

    public function prosesTambahPenerima(){
        $nik = htmlspecialchars($_POST['nik']);
        $nama = htmlspecialchars($_POST['nama']);
        $umur = htmlspecialchars($_POST['umur']);
        $jml_tanggungan = htmlspecialchars($_POST['jml_tanggungan']);
        $penghasilan = htmlspecialchars($_POST['penghasilan']);
        $status_pd = htmlspecialchars($_POST['status_pd']);
        $status_peker = htmlspecialchars($_POST['status_peker']);
        $status_pk = htmlspecialchars($_POST['status_pk']);
        $kelurahan = htmlspecialchars($_POST['kelurahan']);
        $bsp = 0;
        $kip = 0;
        $pbi_jk = 0;
        $pkh = 0;
        $idBansos = mt_rand(1000,9999);
        $idDetail = mt_rand(1000,9999);
       
        if(isset($_POST['pbi_jk'])){
            $pbi_jk = 1;
        }

        if(isset($_POST['bsp'])){
            $bsp = 1;
        }

        if(isset($_POST['kip'])){
            $kip = 1;
        }

        if(isset($_POST['pkh'])){
            $pkh = 1;
        }

        if($nik == null || $nama == null || $umur == null || $jml_tanggungan == null || $penghasilan == null || $status_pd == null||$status_peker == null || $kelurahan == null || $status_pk== null){
            $this->session->set_flashdata('text',"Field Tidak Boleh Kosong");
            $this->session->set_flashdata('icon',"warning");
            $this->session->set_flashdata('title',"Warning !");
            redirect(base_url().'dashboard/tambah_penerima/');
        }

        $classifier = new NaiveBayes();
        $link =$_SERVER['DOCUMENT_ROOT'].'\skripsinurul\public\dataset.csv';
        $dataset = new CsvDataset($link, 15, true);
        $dataset->removeColumns([0,1,2,3,4,5,6,7,8,9,14]);
        $classifier->train($dataset->getSamples(), $dataset->getTargets());
        $label = $classifier->predict([$bsp,$pbi_jk,$kip,$pkh]);
        $insertPenduduk = $this->ModelPenduduk->insertPenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$label);
        $insertDetailPenduduk = $this->ModelPenduduk->insertDetailPenduduk($idDetail,$nik,$kelurahan);
        $insertBantuan = $this->ModelBansos->insertBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk);

        if($insertBantuan && $insertDetailPenduduk && $insertPenduduk){
            $this->session->set_flashdata('text',"Data Penduduk dan Bansos Berhasil disimpan");
            $this->session->set_flashdata('icon',"success");
            $this->session->set_flashdata('title',"Success !");
            redirect(base_url().'dashboard/tambah_penerima/');
        }
    } 

    public function list_data(){
        $data['data'] = $this->db->get('tb_kk')->result_array();
        $data['active_data'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/tabulasi/list_data_penduduk',$data);
        $this->load->view('layout/footer_data');
    }

    public function statistik_kemiskinan(){
        $link =$_SERVER['DOCUMENT_ROOT'].'\skripsinurul\public\dataset.csv';
        $dataset = new CsvDataset($link, 15, true);
        $dataset->removeColumns([0,1,2,3,4,5,6,7,8,9,14]);
        $sample = $dataset->getSamples();
        $target = $dataset->getTargets();
        

        $data['active_kemiskinan'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/statistik/statistik_kemiskinan');
        $this->load->view('layout/footer_data');
    }

    public function statistik_bantuan(){
        $data['active_bantuan'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/statistik/statistik_bantuan');
        $this->load->view('layout/footer_data');
    }

    public function maps(){
        $data['active_maps'] = "active";
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/maps/maps');
        $this->load->view('layout/footer');
    }
}
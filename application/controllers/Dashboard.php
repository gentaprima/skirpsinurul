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
        $tahun = $this->input->post('tahun');
        if($tahun == null){
            $tahun = "2017";
        }
        //Pulogadung (Tidak Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGTidakMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13160');
        $data['percentPGTidakMampu'] = substr(($dataPGTidakMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
        //Pulogadung (Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13160');
        $data['percentPGMampu'] = substr(($dataPGMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
       
        //Pulogadung (Kurang Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGKurangMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13160');
        $data['percentPGKurangMampu'] = substr(($dataPGKurangMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
       
        //Kayu Putih (Tidak Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataKPTidakMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13160');
        $data['percentKPTM'] = substr(($dataKPTidakMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
        
        //Kayu Putih (Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataKPMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13160');
        $data['percentKpMampu'] = substr(($dataKPMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
       
        //Kayu Putih (Kurang Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGKurangMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13160');
        $data['percentKpKm'] = substr(($dataPGKurangMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
        
        //Cipinang (Tidak Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13140');
        $data['percentCiTm'] = substr(($dataCiTm['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
        
        //Cipinang (Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13140');
        $data['percentCiMampu'] = substr(($dataCiMampu['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
       
        //Cipinang (Kurang Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13140');
        $data['percentCiKm'] = substr(($dataCiTm['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
       
        //Jati (Tidak Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13120');
        $data['percentJatiTm'] = substr(($dataJatiTm['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
        
        
        //Jati (Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13120');
        $data['percentJatiMampu'] = substr(($dataJatiMampu['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
       
        //Jati (Kurang Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13120');
        $data['percentJatiKm'] = substr(($dataJatiKm['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
        
        //Rawamangun (Tidak Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13125');
        $data['percentRawamangunTm'] = substr(($dataRawamangunTm['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
        
        
        //Rawamangun (Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13125');
        $data['percentRawamangunMampu'] = substr(($dataRawamangunMampu['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
       
        //Rawamangun (Kurang Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13125');
        $data['percentRawamangunKm'] = substr(($dataRawamangunKm['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
       
        //Pisangan (Tidak Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13130');
        $data['percentPisanganTm'] = substr(($dataPisanganTm['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);
        
        
        //Pisangan (Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13130');
        $data['percentPisanganMampu'] = substr(($dataPisanganMampu['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);
       
        //Pisangan (Kurang Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13130');
        $data['percentPisanganKm'] = substr(($dataPisanganKm['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);

        $data['active_home'] = "active";
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/main',$data);
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
        $idBansos = mt_rand(100000,999999);
        $idDetail = mt_rand(100000,999999);
        $tahun = 2019;
       
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
        $dataTarget = $this->ModelPenduduk->readAllTarget();
        $targetBaru = array();
        $j =0;
        foreach($dataTarget as $target){
            foreach($target as $i){
                $targetBaru[$j] = $i;
                $j++;  
            }
        }
        $dataSamples = $this->ModelPenduduk->readAllData();
        $classifier->train($dataSamples, $targetBaru);
        $label = $classifier->predict([$bsp,$pbi_jk,$kip,$pkh]);
    
        $insertPenduduk = $this->ModelPenduduk->insertPenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label);
        $insertDetailPenduduk = $this->ModelPenduduk->insertDetailPenduduk($idDetail,$nik,$kelurahan);
        $insertBantuan = $this->ModelBansos->insertBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk,$tahun);

        if($insertBantuan && $insertDetailPenduduk && $insertPenduduk){
            $this->session->set_flashdata('text',"Data Penduduk dan Bansos Berhasil disimpan");
            $this->session->set_flashdata('icon',"success");
            $this->session->set_flashdata('title',"Success !");
            redirect(base_url().'dashboard/tambah_penerima/');
        }
    } 

    public function list_data(){
        $data['data'] = $this->ModelPenduduk->getAllDataPenduduk();
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
        $data['dataStatistik'] = $this->_getData();
        
         //data 2012
         $data['kip_2012'] = $this->ModelBansos->getDataKIPByTahun('2012','1');
         $data['bsp_2012'] = $this->ModelBansos->getDataBSPByTahun('2012','1');
         $data['pkh_2012'] = $this->ModelBansos->getDataPKHByTahun('2012','1');
         $data['pbijk_2012'] = $this->ModelBansos->getDataPBIJKByTahun('2012','1');
         //data 2013
         $data['kip_2013'] = $this->ModelBansos->getDataKIPByTahun('2013','1');
         $data['bsp_2013'] = $this->ModelBansos->getDataBSPByTahun('2013','1');
         $data['pkh_2013'] = $this->ModelBansos->getDataPKHByTahun('2013','1');
         $data['pbijk_2013'] = $this->ModelBansos->getDataPBIJKByTahun('2013','1');
         //data 2014
         $data['kip_2014'] = $this->ModelBansos->getDataKIPByTahun('2014','1');
         $data['bsp_2014'] = $this->ModelBansos->getDataBSPByTahun('2014','1');
         $data['pkh_2014'] = $this->ModelBansos->getDataPKHByTahun('2014','1');
         $data['pbijk_2014'] = $this->ModelBansos->getDataPBIJKByTahun('2014','1');
         //data 2015
         $data['kip_2015'] = $this->ModelBansos->getDataKIPByTahun('2015','1');
         $data['bsp_2015'] = $this->ModelBansos->getDataBSPByTahun('2015','1');
         $data['pkh_2015'] = $this->ModelBansos->getDataPKHByTahun('2015','1');
         $data['pbijk_2015'] = $this->ModelBansos->getDataPBIJKByTahun('2015','1');
         //data 2016
         $data['kip_2016'] = $this->ModelBansos->getDataKIPByTahun('2016','1');
         $data['bsp_2016'] = $this->ModelBansos->getDataBSPByTahun('2016','1');
         $data['pkh_2016'] = $this->ModelBansos->getDataPKHByTahun('2016','1');
         $data['pbijk_2016'] = $this->ModelBansos->getDataPBIJKByTahun('2016','1');
         //data 2017
         $data['kip_2017'] = $this->ModelBansos->getDataKIPByTahun('2017','1');
         $data['bsp_2017'] = $this->ModelBansos->getDataBSPByTahun('2017','1');
         $data['pkh_2017'] = $this->ModelBansos->getDataPKHByTahun('2017','1');
         $data['pbijk_2017'] = $this->ModelBansos->getDataPBIJKByTahun('2017','1');
        $data['active_kemiskinan'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/statistik/statistik_kemiskinan',$data);
        $this->load->view('layout/footer_data');
    }

    public function statistik_bantuan(){

        $data['dataStatistik'] = $this->_getData();
        
        //data 2012
        $data['kip_2012'] = $this->ModelBansos->getDataKIPByTahun('2012','1');
        $data['bsp_2012'] = $this->ModelBansos->getDataBSPByTahun('2012','1');
        $data['pkh_2012'] = $this->ModelBansos->getDataPKHByTahun('2012','1');
        $data['pbijk_2012'] = $this->ModelBansos->getDataPBIJKByTahun('2012','1');
        //data 2013
        $data['kip_2013'] = $this->ModelBansos->getDataKIPByTahun('2013','1');
        $data['bsp_2013'] = $this->ModelBansos->getDataBSPByTahun('2013','1');
        $data['pkh_2013'] = $this->ModelBansos->getDataPKHByTahun('2013','1');
        $data['pbijk_2013'] = $this->ModelBansos->getDataPBIJKByTahun('2013','1');
        //data 2014
        $data['kip_2014'] = $this->ModelBansos->getDataKIPByTahun('2014','1');
        $data['bsp_2014'] = $this->ModelBansos->getDataBSPByTahun('2014','1');
        $data['pkh_2014'] = $this->ModelBansos->getDataPKHByTahun('2014','1');
        $data['pbijk_2014'] = $this->ModelBansos->getDataPBIJKByTahun('2014','1');
        //data 2015
        $data['kip_2015'] = $this->ModelBansos->getDataKIPByTahun('2015','1');
        $data['bsp_2015'] = $this->ModelBansos->getDataBSPByTahun('2015','1');
        $data['pkh_2015'] = $this->ModelBansos->getDataPKHByTahun('2015','1');
        $data['pbijk_2015'] = $this->ModelBansos->getDataPBIJKByTahun('2015','1');
        //data 2016
        $data['kip_2016'] = $this->ModelBansos->getDataKIPByTahun('2016','1');
        $data['bsp_2016'] = $this->ModelBansos->getDataBSPByTahun('2016','1');
        $data['pkh_2016'] = $this->ModelBansos->getDataPKHByTahun('2016','1');
        $data['pbijk_2016'] = $this->ModelBansos->getDataPBIJKByTahun('2016','1');
        //data 2017
        $data['kip_2017'] = $this->ModelBansos->getDataKIPByTahun('2017','1');
        $data['bsp_2017'] = $this->ModelBansos->getDataBSPByTahun('2017','1');
        $data['pkh_2017'] = $this->ModelBansos->getDataPKHByTahun('2017','1');
        $data['pbijk_2017'] = $this->ModelBansos->getDataPBIJKByTahun('2017','1');

        $data['active_bantuan'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/statistik/statistik_bantuan',$data);
        $this->load->view('layout/footer_data');
    }

    public function maps(){
        $tahun = $this->input->post('tahun');
        if($tahun == null){
            $tahun = "2017";
        }
        //Pulogadung (Tidak Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGTidakMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13160');
        $data['percentPGTidakMampu'] = substr(($dataPGTidakMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
        //Pulogadung (Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13160');
        $data['percentPGMampu'] = substr(($dataPGMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
       
        //Pulogadung (Kurang Mampu)
        $dataTotalPG = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGKurangMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13160');
        $data['percentPGKurangMampu'] = substr(($dataPGKurangMampu['jumlah'] / $dataTotalPG['jumlah'])*100,0,5);
       
        //Kayu Putih (Tidak Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataKPTidakMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13160');
        $data['percentKPTM'] = substr(($dataKPTidakMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
        
        //Kayu Putih (Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataKPMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13160');
        $data['percentKpMampu'] = substr(($dataKPMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
       
        //Kayu Putih (Kurang Mampu)
        $dataTotalKP = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13160');
        $dataPGKurangMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13160');
        $data['percentKpKm'] = substr(($dataPGKurangMampu['jumlah'] / $dataTotalKP['jumlah'])*100,0,5);
        
        //Cipinang (Tidak Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13140');
        $data['percentCiTm'] = substr(($dataCiTm['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
        
        //Cipinang (Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13140');
        $data['percentCiMampu'] = substr(($dataCiMampu['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
       
        //Cipinang (Kurang Mampu)
        $dataTotalCipinang = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13140');
        $dataCiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13140');
        $data['percentCiKm'] = substr(($dataCiTm['jumlah'] / $dataTotalCipinang['jumlah'])*100,0,5);
       
        //Jati (Tidak Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13120');
        $data['percentJatiTm'] = substr(($dataJatiTm['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
        
        
        //Jati (Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13120');
        $data['percentJatiMampu'] = substr(($dataJatiMampu['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
       
        //Jati (Kurang Mampu)
        $dataTotalJati = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13120');
        $dataJatiKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13120');
        $data['percentJatiKm'] = substr(($dataJatiKm['jumlah'] / $dataTotalJati['jumlah'])*100,0,5);
        
        //Rawamangun (Tidak Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13125');
        $data['percentRawamangunTm'] = substr(($dataRawamangunTm['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
        
        
        //Rawamangun (Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13125');
        $data['percentRawamangunMampu'] = substr(($dataRawamangunMampu['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
       
        //Rawamangun (Kurang Mampu)
        $dataTotalRawamangun = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13125');
        $dataRawamangunKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13125');
        $data['percentRawamangunKm'] = substr(($dataRawamangunKm['jumlah'] / $dataTotalRawamangun['jumlah'])*100,0,5);
       
        //Pisangan (Tidak Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganTm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'tidak mampu','13130');
        $data['percentPisanganTm'] = substr(($dataPisanganTm['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);
        
        
        //Pisangan (Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganMampu = $this->ModelBansos->getDataKelurahanByTahun($tahun,'mampu','13130');
        $data['percentPisanganMampu'] = substr(($dataPisanganMampu['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);
       
        //Pisangan (Kurang Mampu)
        $dataTotalPisangan = $this->ModelBansos->getAllDataKelurahanByTahun($tahun,'13130');
        $dataPisanganKm = $this->ModelBansos->getDataKelurahanByTahun($tahun,'kurang mampu','13130');
        $data['percentPisanganKm'] = substr(($dataPisanganKm['jumlah'] / $dataTotalPisangan['jumlah'])*100,0,5);


        $data['tahun'] = $tahun;
        $data['active_maps'] = "active";
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/maps/maps',$data);
        $this->load->view('layout/footer');
    }

    public function _getData(){
          //data 2012
          $dataAll2012 = $this->ModelBansos->getAllDataByTahun("2012");
          //mampu 2012
          $data2012mampu = $this->ModelBansos->getDataByTahun("2012","mampu");
          $data['data_mampu2012'] = ($data2012mampu['jumlah']/$dataAll2012['jumlah_data'])*100;
          
  
          //tidak mampu 2012
          $data2012tdkmampu = $this->ModelBansos->getDataByTahun("2012","tidak mampu");
          $data['data_tdkmampu2012'] = ($data2012tdkmampu['jumlah']/$dataAll2012['jumlah_data'])*100;
  
          //kurang mampu 2012
          $data2012kurangmampu = $this->ModelBansos->getDataByTahun("2012","kurang mampu");
          $data['data_kurangmampu2012'] = ($data2012kurangmampu['jumlah']/$dataAll2012['jumlah_data'])*100;
          
  
          //data 2013
          $dataAll2013 = $this->ModelBansos->getAllDataByTahun("2013");
          //mampu 2013
          $data2013mampu = $this->ModelBansos->getDataByTahun("2013","mampu");
          $data['data_mampu2013'] = ($data2013mampu['jumlah']/$dataAll2013['jumlah_data'])*100;
          
          //tidak mampu 2012
          $data2013tdkmampu = $this->ModelBansos->getDataByTahun("2013","tidak mampu");
          $data['data_tdkmampu2013'] = ($data2013tdkmampu['jumlah']/$dataAll2013['jumlah_data'])*100;
  
          //kurang mampu 2012
          $data2013kurangmampu = $this->ModelBansos->getDataByTahun("2013","kurang mampu");
          $data['data_kurangmampu2013'] = ($data2013kurangmampu['jumlah']/$dataAll2013['jumlah_data'])*100;
          
          //data 2014
          $dataAll2014 = $this->ModelBansos->getAllDataByTahun("2014");
          //mampu 2014
          $data2014mampu = $this->ModelBansos->getDataByTahun("2014","mampu");
          $data['data_mampu2014'] = ($data2014mampu['jumlah']/$dataAll2014['jumlah_data'])*100;
          
          //tidak mampu 2014
          $data2014tdkmampu = $this->ModelBansos->getDataByTahun("2014","tidak mampu");
          $data['data_tdkmampu2014'] = ($data2014tdkmampu['jumlah']/$dataAll2014['jumlah_data'])*100;
  
          //kurang mampu 2014
          $data2014kurangmampu = $this->ModelBansos->getDataByTahun("2014","kurang mampu");
          $data['data_kurangmampu2014'] = ($data2014kurangmampu['jumlah']/$dataAll2014['jumlah_data'])*100;
       
          //data 2015
          $dataAll2015 = $this->ModelBansos->getAllDataByTahun("2015");
          //mampu 2015
          $data2015mampu = $this->ModelBansos->getDataByTahun("2015","mampu");
          $data['data_mampu2015'] = ($data2015mampu['jumlah']/$dataAll2015['jumlah_data'])*100;
          
          //tidak mampu 2015
          $data2015tdkmampu = $this->ModelBansos->getDataByTahun("2015","tidak mampu");
          $data['data_tdkmampu2015'] = ($data2015tdkmampu['jumlah']/$dataAll2015['jumlah_data'])*100;
  
          //kurang mampu 2015
          $data2015kurangmampu = $this->ModelBansos->getDataByTahun("2015","kurang mampu");
          $data['data_kurangmampu2015'] = ($data2015kurangmampu['jumlah']/$dataAll2015['jumlah_data'])*100;
         
          //data 2016
          $dataAll2016 = $this->ModelBansos->getAllDataByTahun("2016");
          //mampu 2016
          $data2016mampu = $this->ModelBansos->getDataByTahun("2016","mampu");
          $data['data_mampu2016'] = ($data2016mampu['jumlah']/$dataAll2016['jumlah_data'])*100;
          
          //tidak mampu 2016
          $data2016tdkmampu = $this->ModelBansos->getDataByTahun("2016","tidak mampu");
          $data['data_tdkmampu2016'] = ($data2016tdkmampu['jumlah']/$dataAll2016['jumlah_data'])*100;
  
          //kurang mampu 2016
          $data2016kurangmampu = $this->ModelBansos->getDataByTahun("2016","kurang mampu");
          $data['data_kurangmampu2016'] = ($data2016kurangmampu['jumlah']/$dataAll2016['jumlah_data'])*100;
          
          //data 2017
          $dataAll2017 = $this->ModelBansos->getAllDataByTahun("2017");
          //mampu 2017
          $data2017mampu = $this->ModelBansos->getDataByTahun("2017","mampu");
          $data['data_mampu2017'] = ($data2017mampu['jumlah']/$dataAll2017['jumlah_data'])*100;
          
          //tidak mampu 2017
          $data2017tdkmampu = $this->ModelBansos->getDataByTahun("2017","tidak mampu");
          $data['data_tdkmampu2017'] = ($data2017tdkmampu['jumlah']/$dataAll2017['jumlah_data'])*100;
  
          //kurang mampu 2017
          $data2017kurangmampu = $this->ModelBansos->getDataByTahun("2017","kurang mampu");
          $data['data_kurangmampu2017'] = ($data2017kurangmampu['jumlah']/$dataAll2017['jumlah_data'])*100;

          return $data;
    }

    public function laporan(){
        //tahun 2012
        $data['countMampu2012'] = $this->ModelBansos->getDataByTahun("2012","mampu");
        $data['countTdkMampu2012'] = $this->ModelBansos->getDataByTahun("2012","tidak mampu");
        $data['countKurangMampu2012'] = $this->ModelBansos->getDataByTahun("2012","kurang mampu");

        //tahun 2013
        $data['countMampu2013'] = $this->ModelBansos->getDataByTahun("2013","mampu");
        $data['countTdkMampu2013'] = $this->ModelBansos->getDataByTahun("2013","tidak mampu");
        $data['countKurangMampu2013'] = $this->ModelBansos->getDataByTahun("2013","kurang mampu");
        
        //tahun 2014
        $data['countMampu2014'] = $this->ModelBansos->getDataByTahun("2014","mampu");
        $data['countTdkMampu2014'] = $this->ModelBansos->getDataByTahun("2014","tidak mampu");
        $data['countKurangMampu2014'] = $this->ModelBansos->getDataByTahun("2014","kurang mampu");

        //tahun 2015
        $data['countMampu2015'] = $this->ModelBansos->getDataByTahun("2015","mampu");
        $data['countTdkMampu2015'] = $this->ModelBansos->getDataByTahun("2015","tidak mampu");
        $data['countKurangMampu2015'] = $this->ModelBansos->getDataByTahun("2015","kurang mampu");

        $data ['data_all'] = array_push( $data['countMampu2015']);
        //tahun 2016
        $data['countMampu2016'] = $this->ModelBansos->getDataByTahun("2016","mampu");
        $data['countTdkMampu2016'] = $this->ModelBansos->getDataByTahun("2016","tidak mampu");
        $data['countKurangMampu2016'] = $this->ModelBansos->getDataByTahun("2016","kurang mampu");

        //tahun 2017
        $data['countMampu2017'] = $this->ModelBansos->getDataByTahun("2017","mampu");
        $data['countTdkMampu2017'] = $this->ModelBansos->getDataByTahun("2017","tidak mampu");
        $data['countKurangMampu2017'] = $this->ModelBansos->getDataByTahun("2017","kurang mampu");

        $data['active_laporan'] = "active"; 
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar',$data);
        $this->load->view('layout/right_sidebar');

        $this->load->view('dashboard/tabulasi/laporan',$data);
        $this->load->view('layout/footer_data');
    }

    public function deletePenduduk(){
        $idDetail = $this->uri->segment(3);
        $nik = $this->uri->segment(4);

        $this->ModelBansos->deleteBansosByIdDetail($idDetail);
        $this->ModelPenduduk->deleteDetailPendudukByNik($nik);
        $this->ModelPenduduk->deletePendudukByNik($nik);

        $this->session->set_flashdata('text',"Data Penduduk Berhasil dihapus");
        $this->session->set_flashdata('icon',"success");
        $this->session->set_flashdata('title',"Success !");
        redirect(base_url().'dashboard/list_data/');

    }

    public function update_Penduduk(){
        $nik = $this->uri->segment(3);

        if($nik == null){
            redirect(base_url().'dashboard/list_data/');
        }

        $data['kelurahan'] = $this->db->get('tb_kelurahan')->result_array();
        $data['data_penerima'] = $this->ModelPenduduk->getAllDataPendudukByNik($nik);
        $this->load->view('layout/header');
        $this->load->view('layout/loader');
        $this->load->view('layout/topbar');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/right_sidebar');
        $this->load->view('dashboard/forms/update_penerima',$data);
        $this->load->view('layout/footer');

    }

    public function prosesUpdate(){
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
        $idBansos = htmlspecialchars($_POST['id_bansos']);
        $idDetail = htmlspecialchars($_POST['id_detail']);
        $tahun = $_POST['tahun'];
       
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
            redirect(base_url().'dashboard/update_penduduk/'.$nik);
        }
        $classifier = new NaiveBayes();
        $dataTarget = $this->ModelPenduduk->readAllTarget();
        $targetBaru = array();
        $j =0;
        foreach($dataTarget as $target){
            foreach($target as $i){
                $targetBaru[$j] = $i;
                $j++;  
            }
                }
        $dataSamples = $this->ModelPenduduk->readAllData();
        $classifier->train($dataSamples, $targetBaru);
        $label = $classifier->predict([$bsp,$pbi_jk,$kip,$pkh]);
    
        $updatePenduduk = $this->ModelPenduduk->updatePenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label);
        $updateDetailPenduduk = $this->ModelPenduduk->updateDetailPenduduk($idDetail,$nik,$kelurahan);
        $updateBantuan = $this->ModelBansos->updateBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk,$tahun);

        if($updateBantuan && $updateDetailPenduduk && $updatePenduduk){
            $this->session->set_flashdata('text',"Data Penduduk dan Bansos Berhasil diubah");
            $this->session->set_flashdata('icon',"success");
            $this->session->set_flashdata('title',"Success !");
            redirect(base_url().'dashboard/list_data/');
        }
    }

    public function cetak(){
              //tahun 2012
              $data['countMampu2012'] = $this->ModelBansos->getDataByTahun("2012","mampu");
              $data['countTdkMampu2012'] = $this->ModelBansos->getDataByTahun("2012","tidak mampu");
              $data['countKurangMampu2012'] = $this->ModelBansos->getDataByTahun("2012","kurang mampu");
      
              //tahun 2013
              $data['countMampu2013'] = $this->ModelBansos->getDataByTahun("2013","mampu");
              $data['countTdkMampu2013'] = $this->ModelBansos->getDataByTahun("2013","tidak mampu");
              $data['countKurangMampu2013'] = $this->ModelBansos->getDataByTahun("2013","kurang mampu");
              
              //tahun 2014
              $data['countMampu2014'] = $this->ModelBansos->getDataByTahun("2014","mampu");
              $data['countTdkMampu2014'] = $this->ModelBansos->getDataByTahun("2014","tidak mampu");
              $data['countKurangMampu2014'] = $this->ModelBansos->getDataByTahun("2014","kurang mampu");
      
              //tahun 2015
              $data['countMampu2015'] = $this->ModelBansos->getDataByTahun("2015","mampu");
              $data['countTdkMampu2015'] = $this->ModelBansos->getDataByTahun("2015","tidak mampu");
              $data['countKurangMampu2015'] = $this->ModelBansos->getDataByTahun("2015","kurang mampu");
      
              $data ['data_all'] = array_push( $data['countMampu2015']);
              //tahun 2016
              $data['countMampu2016'] = $this->ModelBansos->getDataByTahun("2016","mampu");
              $data['countTdkMampu2016'] = $this->ModelBansos->getDataByTahun("2016","tidak mampu");
              $data['countKurangMampu2016'] = $this->ModelBansos->getDataByTahun("2016","kurang mampu");
      
              //tahun 2017
              $data['countMampu2017'] = $this->ModelBansos->getDataByTahun("2017","mampu");
              $data['countTdkMampu2017'] = $this->ModelBansos->getDataByTahun("2017","tidak mampu");
              $data['countKurangMampu2017'] = $this->ModelBansos->getDataByTahun("2017","kurang mampu");
              $this->load->view('dashboard/tabulasi/v_laporan',$data);
    }
}
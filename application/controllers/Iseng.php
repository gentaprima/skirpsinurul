<?php

require_once  $_SERVER['DOCUMENT_ROOT'].'/skripsinurul/vendor/autoload.php';
use Phpml\Classification\NaiveBayes;
use Phpml\Regression\LeastSquares;
use Phpml\Dataset\CsvDataset;


    class Iseng extends CI_Controller{

        

        public function index(){
            $link =$_SERVER['DOCUMENT_ROOT'].'\skripsinurul\public\dataset.csv';
            $dataset = new CsvDataset($link, 15, true);
            $target = $dataset->getTargets();
            $samples = $dataset->getSamples();
            $classifier = new NaiveBayes();
            $dataset->removeColumns([0,1,2,3,4,5,6,7,8,9,14]);
            $classifier->train($samples, $target);
            $count = count($target);
            $kurang = 0;
            $mampu = 0;
            $tidak =0;
            $kip = 0;
            $pbijk = 0;
            $bsp = 0;
            $pkh = 0;

            $val_bsp = [];
            $val_pbijk = [];
            $val_kip = [];
            $val_pkh = [];
            $val_year = [];

            // 10 - 14
            for($i = 0; $i < count($samples); $i++){
                array_push($val_bsp,$samples[$i][10]);
                array_push($val_pbijk,$samples[$i][11]);
                array_push($val_kip,$samples[$i][12]); 
                array_push($val_pkh,$samples[$i][13]);
                array_push($val_year,$samples[$i][14]);                 
                // print_r($samples[$i][10]);
            }
            $test['bsp'] = $val_bsp;
            $test['pbijk'] = $val_pbijk;
            $test['kip'] = $val_kip;
            $test['pkh'] = $val_pkh;
            $test['year'] = $val_year;
            print_r($test);die;
           
            for($i = 0 ; $i<count($target);$i++){
                if(str_replace(" ","",$target[$i]) == "mampu"){
                    $mampu+=1;
                }else if(str_replace(" ","",$target[$i]) == "tidakmampu"){
                    $tidak+=1;
                }else if(str_replace(" ","",$target[$i]) == "kurangmampu"){
                    $kurang+=1;
                }
        
            }

            for($i = 0 ; $i<count($samples);$i++){
                if($samples[$i][10]=="1"){
                    
                }
                if($samples[$i][10]=="1"){

                }
                if($samples[$i][10]=="1"){

                }
                if($samples[$i][10]=="1"){

                }
                if($samples[$i][10]=="1"){

                }
            }
                        
            // $this->load->view('data',$data);

        }
       
    }
<?php

require_once  $_SERVER['DOCUMENT_ROOT'].'/skripsinurul/vendor/autoload.php';
use Phpml\Classification\NaiveBayes;
use Phpml\Regression\LeastSquares;
use Phpml\Dataset\CsvDataset;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ClassificationReport;
use Phpml\CrossValidation\RandomSplit;
use Phpml\Dataset\ArrayDataset;



    class Iseng extends CI_Controller{

        public function __construct()
        {
            parent::__construct();
            $this->load->model('ModelPenduduk');
            $this->load->model('ModelBansos');
        }
        

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
       
        public function checkAccuracy(){
            $dataTarget = $this->ModelPenduduk->readAllTarget();
            $dataSamples = $this->ModelPenduduk->readAllData();
            $targetTo1D = array();
            $j =0;
            foreach($dataTarget as $target){
                foreach($target as $i){
                    $targetTo1D[$j] = $i;
                    $j++;  
                }
            }
            $predictLabels;
            $correct = 0;
            $count = count($dataSamples);
            for($i=0;$i<$count;$i++){
                $classifier = new NaiveBayes();
                $classifier->train($dataSamples, $targetTo1D);
                $predict = $classifier->predict([$dataSamples[$i]]);
                $predictLabels[$i] = $predict[0];
                if($predict[0] == $targetTo1D[$i]){
                    $correct++;
                }
            }
            $report = new ClassificationReport($targetTo1D, $predictLabels);
            $score = Accuracy::score($targetTo1D, $predictLabels);
            $precision=  $report->getPrecision();
            $recall=  $report->getRecall();
            $f1score =  $report->getF1score();
            $support =  $report->getSupport();
            $average=  $report->getAverage();
            $score = $score*100;
            echo "Score :  $score , yang Benar : $correct , Dari Jumlah Data : $count<br>";
            //recall
            print_r($recall);
            
            //f1score 
            print_r($f1score);
            //average =
        
            print_r($average);
        }

        public function randomSplitCrossValidation(){
            
            $dataTarget = $this->ModelPenduduk->readAllTarget();
            $dataSamples = $this->ModelPenduduk->readAllData();
            //print_r($dataSamples);die;
            $targetTo1D = array();
            $j =0;
            foreach($dataTarget as $target){
                foreach($target as $i){
                    $targetTo1D[$j] = $i;
                    $j++;  
                }
            }
            $dataset = new ArrayDataset($dataSamples, $targetTo1D);  
            $seed = rand();
            $dataset = new RandomSplit($dataset, 0.3, $seed);
            //train group
            $trainSample=  $dataset->getTrainSamples();
            $trainLabels=  $dataset->getTrainLabels();

            // test group
           $testSampel =  $dataset->getTestSamples();
           $testLabels = $dataset->getTestLabels();
            $correct = 0;
           $classifier = new NaiveBayes();
           $classifier->train($trainSample, $trainLabels);
           for($i = 0 ;$i<count($testSampel);$i++){
             $predict = $classifier->predict([$testSampel[$i]]);
             if($predict[0] == $testLabels[0]){
              $correct++;
             }
             echo($predict[0].$testSampel[$i][0].$testSampel[$i][1].$testSampel[$i][2].$testSampel[$i][3]."<br>");
           }
           echo "Jumlah Data Benar : ".$correct;
        }
    }
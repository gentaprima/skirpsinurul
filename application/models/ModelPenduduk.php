<?php 

    class ModelPenduduk extends CI_Model{

        public function insertPenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$label){
            $sql = "INSERT INTO tb_kk VALUES(?,?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$label));
        }

        public function insertDetailPenduduk($idDetail,$nik,$kelurahan){
            $sql = "INSERT INTO tb_kk_detail VALUES(?,?,?)";
            return $this->db->query($sql,array("KK-".$idDetail,$nik,$kelurahan));
        }
    }
<?php 

    class ModelPenduduk extends CI_Model{

        public function insertPenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label){
            $sql = "INSERT INTO tb_kk VALUES(?,?,?,?,?,?,?,?,?)";
            return $this->db->query($sql,array($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label));
        }

        public function insertDetailPenduduk($idDetail,$nik,$kelurahan){
            $sql = "INSERT INTO tb_kk_detail VALUES(?,?,?)";
            return $this->db->query($sql,array("KK-".$idDetail,$nik,$kelurahan));
        }


        public function readAllData(){
            $sql  = "SELECT kip as '0' ,pkh as '1' ,bsp as '2',pbi_jk as '3' from tb_bansos,tb_kk,tb_kk_detail WHERE tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND tb_kk_detail.nik = tb_kk.nik";
            return $this->db->query($sql)->result_array();
        }

        public function readAllTarget(){
            $sql  = "SELECT labels as '0' from tb_bansos,tb_kk,tb_kk_detail WHERE tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND tb_kk_detail.nik = tb_kk.nik";
            return $this->db->query($sql)->result_array();
        }

        public function getAllDataPenduduk(){
            $sql = "SELECT tb_kk.nik,nama,umur,status_perkawinan,pendidikan,status_pekerjaan,penghasilan,tanggungan,labels,tahun,tb_kk_detail.id_detail from tb_bansos,tb_kk,tb_kk_detail where tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND tb_kk_detail.nik = tb_kk.nik order by tb_bansos.tahun DESC";
            return $this->db->query($sql)->result_array();
        }

        public function getAllDataPendudukByNik($nik){
            $sql = "SELECT tb_kk.nik,nama,umur,status_perkawinan,pendidikan,status_pekerjaan,penghasilan,tanggungan,labels,tahun,                        tb_kk_detail.id_detail,tanggungan,tb_kelurahan.id_kelurahan,nama_kelurahan,kip,bsp,pkh,pbi_jk,                 tb_bansos.id_bansos,tahun
                                from tb_bansos,tb_kk,tb_kk_detail,tb_kelurahan
                                 where 
                                 tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND
                                 tb_kk_detail.nik = tb_kk.nik AND 
                                 tb_kk.nik = ? AND
                                 tb_kk_detail.id_kelurahan = tb_kelurahan.id_kelurahan " ;
            return $this->db->query($sql,$nik)->result_array();
            
        }

        public function deleteDetailPendudukByNik($nik){
            $sql = "DELETE from tb_kk_detail WHERE nik = ?";
            return $this->db->query($sql,$nik);
        }

        public function deletePendudukByNik($nik){
            $sql = "DELETE from tb_kk WHERE nik = ?";
            return $this->db->query($sql,$nik);
        }

        public function updatePenduduk($nik,$nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label){
            $sql = "UPDATE tb_kk SET nama = ?, umur = ?, status_perkawinan = ?,pendidikan = ?,status_pekerjaan = ?,penghasilan = ?,
                            tanggungan = ?, labels = ? WHERE
                            nik = ?";
            return $this->db->query($sql,array($nama,$umur,$status_pk,$status_pd,$status_peker,$penghasilan,$jml_tanggungan,$label,$nik));
        }

        public function updateDetailPenduduk($idDetail,$nik,$kelurahan){
            $sql = "UPDATE tb_kk_detail SET nik = ? , id_kelurahan = ? WHERE id_detail = ?";
            return $this->db->query($sql,array($nik,$kelurahan,$idDetail));
        }
    }
<?php

    class ModelBansos extends CI_Model{
        public function insertBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk,$tahun){
            $sql = "INSERT INTO tb_bansos VALUES (?,?,?,?,?,?,?)";
            return $this->db->query($sql,array("BSS-".$idBansos,"KK-".$idDetail,$kip,$pkh,$bsp,$pbi_jk,$tahun));
        }

        public function getDataByTahun($tahun,$label){
            $sql = "SELECT COUNT(id_bansos)as jumlah from tb_bansos,tb_kk,tb_kk_detail WHERE
                        tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND
                        tb_kk_detail.nik = tb_kk.nik AND
                        tb_bansos.tahun = ? AND
                        tb_kk.labels = ?";
            return $this->db->query($sql,array($tahun,$label))->row_array();
        }

        public function getDataKelurahanByTahun($tahun,$label,$kelurahan){
            $sql = "SELECT COUNT(id_bansos)as jumlah from tb_bansos,tb_kk,tb_kk_detail WHERE
                            tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND
                            tb_kk_detail.nik = tb_kk.nik AND
                            tb_bansos.tahun = ? AND
                            tb_kk.labels = ? AND
                            tb_kk_detail.id_kelurahan = ?";
            return $this->db->query($sql,array($tahun,$label,$kelurahan))->row_array();
        }

        public function getAllDataKelurahanByTahun($tahun,$kelurahan){
            $sql = "SELECT COUNT(id_bansos)as jumlah from tb_bansos,tb_kk,tb_kk_detail WHERE
                        tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND
                        tb_kk_detail.nik = tb_kk.nik AND
                        tb_bansos.tahun = ? AND
                        tb_kk_detail.id_kelurahan = ?";
            return $this->db->query($sql,array($tahun,$kelurahan))->row_array();
        }

        public function getAllDataByTahun($tahun){
            $sql = "SELECT COUNT(id_bansos) as jumlah_data FROM tb_bansos WHERE tahun =?";
            return $this->db->query($sql,$tahun)->row_array();
        }

        public function getDataKIPByTahun($tahun,$bantuan){
            $sql = "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos WHERE
                        kip = ? AND
                        tahun = ?";
            return $this->db->query($sql,array($bantuan,$tahun))->row_array();
        }

        public function getDataBSPByTahun($tahun,$bantuan){
            $sql = "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos WHERE
                        bsp = ? AND
                        tahun = ?";
            return $this->db->query($sql,array($bantuan,$tahun))->row_array();
        }

        public function getDataPKHByTahun($tahun,$bantuan){
            $sql = "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos WHERE
                        pkh = ? AND
                        tahun = ?";
            return $this->db->query($sql,array($bantuan,$tahun))->row_array();
        }
        public function getDataPBIJKByTahun($tahun,$bantuan){
            $sql = "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos WHERE
                        pbi_jk = ? AND
                        tahun = ?";
            return $this->db->query($sql,array($bantuan,$tahun))->row_array();
        }

        public function deleteBansosByIdDetail($idDetail){
            $sql = "DELETE from tb_bansos WHERE id_kk_detail = ?";
            return $this->db->query($sql,$idDetail);
        }

        public function updateBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk,$tahun){
            $sql = "UPDATE tb_bansos SET kip = ?,pkh = ?, bsp = ?, pbi_jk = ?, tahun = ? WHERE id_bansos = ?";
            return $this->db->query($sql,array($kip,$pkh,$bsp,$pbi_jk,$tahun,$idBansos));
        }


        public function getDataBansosByKelurahan($jenis,$kelurahan){
            $sql =  "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos,tb_kelurahan,tb_kk_detail WHERE
            $jenis = 1 AND
            tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND tb_kk_detail.id_kelurahan= tb_kelurahan.id_kelurahan AND tb_kelurahan.nama_kelurahan=?";
            return $this->db->query($sql,$kelurahan)->row_array();
        }


        public function getAllDataByKelurahan($kelurahan){
            $sql = "SELECT COUNT(id_bansos) as jumlah FROM tb_bansos,tb_kelurahan,tb_kk_detail WHERE tb_bansos.id_kk_detail = tb_kk_detail.id_detail AND tb_kk_detail.id_kelurahan= tb_kelurahan.id_kelurahan AND tb_kelurahan.nama_kelurahan=?";
            return $this->db->query($sql,$kelurahan)->row_array();
        }

        public function getDataTidakMampuByTahun($kelurahan,$label,$tahun){
             $sql = "SELECT DISTINCT id_bansos as jumlah 
                        From tb_bansos,tb_kk_detail,tb_kk,tb_kelurahan WHERE
                        tb_kk_detail.nik = tb_kk.nik AND
                        tb_kk_detail.id_kelurahan = tb_kelurahan.id_kelurahan AND
                        tb_kelurahan.nama_kelurahan = ? AND
                        tb_kk.labels = ? AND
                        tb_bansos.tahun = ?";
            return $this->db->query($sql,array($kelurahan,$label,$tahun))->result_array();
        }

        public function getDataTotalByKelurahanAndTahun($kelurahan,$tahun){
            $sql = "SELECT id_bansos from tb_bansos,tb_kk,tb_kk_detail,tb_kelurahan WHERE
                        tb_bansos.id_detail";
            return $this->db->query($sql,array($kelurahan,$tahun))->result_array();
        }
    }
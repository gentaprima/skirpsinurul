<?php

    class ModelBansos extends CI_Model{
        public function insertBansos($idBansos,$idDetail,$kip,$pkh,$bsp,$pbi_jk){
            $sql = "INSERT INTO tb_bansos VALUES (?,?,?,?,?,?)";
            return $this->db->query($sql,array("BSS-".$idBansos,"KK-".$idDetail,$kip,$pkh,$bsp,$pbi_jk));
        }
    }
<?php

!defined('IN_TIPASK') && exit('Access Denied');
 
class diaodanpingtaimodel {

    var $db;
    var $base;


    function diaodanpingtaimodel(&$base) {
        $this->base = $base;
        $this->db = $base->db;
    }

    /* 根据aid获取一个答案的内容，暂时无用 */

    function get($id) {
        return $this->db->fetch_first("SELECT * FROM " . DB_TABLEPRE . "diaodanpingtai WHERE id='$id'");
    }
     function get_by_name($name) {
        return $this->db->fetch_first("SELECT * FROM " . DB_TABLEPRE . "diaodanpingtai WHERE name='$name'");
    }
      function add($name) {
      	
        $this->db->query("INSERT INTO " . DB_TABLEPRE . "diaodanpingtai(name) VALUES ('$name')");
    }
 function update($id, $name) {
        $this->db->query("UPDATE " . DB_TABLEPRE . "diaodanpingtai SET `name`='$name'  WHERE `id`=$id");
    }
    function remove_by_id($id){
    	  $this->db->query("DELETE FROM `" . DB_TABLEPRE . "diaodanpingtai` WHERE `id` IN ($id)");
    }
    function get_list(){
    	  $pingtailist = array();
       
    	  $sql = 'SELECT * FROM `' . DB_TABLEPRE . 'diaodanpingtai' ;
    	  $query = $this->db->query($sql);
        
        while ($pingtai = $this->db->fetch_array($query)) {
           
            $pingtailist[] = $pingtai;
        }
        return $pingtailist;  
    }

    
}
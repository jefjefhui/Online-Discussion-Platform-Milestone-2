<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here
 class UploadFile_model extends CI_Model{

 
    public function upload($filename,$path,$responseID){

        $data = array(
            'filename' =>$filename,
            'path' =>$path,
            'responseID'=>$responseID
        );

        $query =$this->db->insert('replyFiles',$data);
      
        
      //return $query->result_array();
      

      //return $ToArray;
    }

    public function getResponseIDForReplyFiles(){
        $query =$this->db->query("select responseID FROM responses ORDER BY responseID DESC LIMIT 1");
        $convertToArray = $query->row_array();
        $result =$convertToArray["responseID"];
  
        return $result;



    }
 
}
?>
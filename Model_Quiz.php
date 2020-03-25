<?php
class Model_Quiz extends CI_Model{
	function insert_data($data){
		$this->db->insert("quizmaker",$data);
	}
	function fetch_data(){
		$query = $this->db->get("quizmaker");
		//select * from table_name;
		return $query;

	}
	function delete_data($id){
		$this->db->where("id",$id);
		$this->db->delete("quizmaker");
		//delete from table where id = 


	}

	function fetch_single_data($id){
		$this->db->where("id",$id);
		$query = $this->db->get("quizmaker");
		return $query;
	}
	function update_data($data,$id){
		$this->db->where("id",$id);
		$this->db->update("quizmaker",$data);
		
	}
}
?>

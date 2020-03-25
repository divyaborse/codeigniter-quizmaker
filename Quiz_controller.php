<?php
class Quiz_controller extends CI_Controller{
	function index(){
		$this->load->model('Model_Quiz');
		$data["fetch_data"] = $this->Model_Quiz->fetch_data();

		//$this->load->view('Quiz_view');
		$this->load->view('Quiz_view',$data);
	}
	 function form_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules("user_id","user_id",'required');
		$this->form_validation->set_rules("class","class",'required');
		$this->form_validation->set_rules("question","question",'required');
		$this->form_validation->set_rules("answer","answer",'required');
		//$this->form_validation->set_rules("","Name",'required|alpha');
		//
		
		if($this->form_validation->run())
		{
			$this->load->model('Model_Quiz');
			$data = array(
				"user_id" =>$this->input->post("user_id"),
				"class" =>$this->input->post("class"),
				"question" =>$this->input->post("question"),
				"answer" =>$this->input->post("answer"));
				
				
			if($this->input->post("Update")){
		$this->Model_Quiz->update_data($data,$this->input->post("hidden_id"));
				redirect(base_url()."Quiz_controller/updated");
			}
			if($this->input->post("Insert"))
			{
			$this->Model_Quiz->insert_data($data);
			
			redirect(base_url()."Quiz_controller/inserted");
		}

		}
		else{
			$this->index();
		}
	}
public function inserted(){
$this->index();
}
function delete_data(){
	$id = $this->uri->segment(3);
	$this->load->model("Model_Quiz");

	$this->Model_Quiz->delete_data($id);
	redirect(base_url()."Quiz_controller/deleted");
	}
	public function deleted(){
		$this->index();
	}


public function update_data(){
	$user_id = $this->uri->segment(3);
	$this->load->model('Model_Quiz');
	$data["user_data"] = $this->Model_Quiz->fetch_single_data($user_id);
	$data["fetch_data"] = $this->Model_Quiz->fetch_data();
	$this->load->view("Quiz_view",$data);
}
public function updated(){
	$this->index();
}
}	

?>

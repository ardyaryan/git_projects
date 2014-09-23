<?php
class Home extends CI_Controller{

	public function index()
	{
		$this->load->view('home');

	}
	//
	public function contact()
	{
		$this->load->view('contact');
		
	}
	//
	public function register()
	{
		$this->load->view('register');
		
	}
	//
	public function logout()
	{
		$this->load->view('logout');
		
	}
	//
	public function profile()
	{
		session_start();
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == true )
		{
			$username = $_SESSION['username'];
			$this->load->model('profile');
			$data['records'] = $this->profile->getData($username); // name of the model, not the class
			$this->load->view('profile',$data);
		}
		if (isset($_SESSION['logged']) && $_SESSION['logged'] == false)
		{
			$data['records'] = array();
			$this->load->view('profile', $data);
		}
		
	}
	//
	public function save()
	{
		// first load the data model as an object
		$this->load->model('save');
		// construct the data
		$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password')
					);
		// Transfering Data To Model, you have to call model as an object now (save) abd save has form_insert as a method inside
		$this->save->form_insert($data);

		// Loading View
		$this->load->view('save');
	}
	//
	public function login()
	{
		session_start();
		if($_SESSION['logged'] != 1 ) // check if its coming from another link so it doesnt try to login again
		{
			// retreiveing data from form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$_SESSION['username'] = $username;
			// Transfering Data To Model, you have to call model as an object now (save) abd save has form_insert as a method inside
			$this->load->model('login');
			$this->login->login_user($username, $password);		
			$this->load->view('login');
		}
		else
		{
			$username = $_SESSION['username'];
			$this->load->model('profile');
			$data['records'] = $this->profile->getData($username); // name of the model, not the class
			$this->load->view('login',$data);
			//$this->load->view('login');
		}
	}
	// 
	public function check_login()
	{	
		$page = $_GET['page'];
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|valid_email');
		if($this->form_validation->run() == false)
			{
				$this->load->view($page);
			}
		else
			{
				if($page == 'register'){$this->save();}
				if($page == 'contact'){$this->send_email();}
			}
	}
	//
	public function send_email()
	{
		$this->load->helper('url');
		$data = array(
					'email' => $this->input->post('email'),
					'message' => $this->input->post('message'),
					);
		$this->load->model('MyEmail');
		$this->MyEmail->send_email($data);	
		redirect('home/thank_you');	
	}
	//
	public function thank_you()
	{
		$this->load->view('thankyou');
	}
	//
	public function google_maps (){
		$this->load->library('Googlemaps');
		$config = array();
		$config['center'] = 'Toronto, Canada';
		$config['zoom'] = 8;
		//
		$marker = array();
		if(isset($_POST['position']) )
		{ 
			$marker['position'] = $this->input->post('position');
			$config['center'] = $this->input->post('position');
		}
		else
		{ 
			$marker['position'] = '#18 Yorkville, Toronto, ON , Canada';
		}
		$this->googlemaps->initialize($config);
		$this->googlemaps->add_marker($marker);
		
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('google_maps', $data);
	}	


	
}
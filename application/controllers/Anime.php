<?php
	class Anime extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}

			public function index()
			{
					
			}

			public function view($name)
			{
				$name = urldecode($name);
				$data['name'] =$name;
				$data['episodes'] = $this->anime_model->get_Episodes($name);
				$data['anime'] = $this->anime_model->get_Anime($name)[0];
				if(!$data['anime']){
					show_404();
				}
				$data['genres'] = $this->anime_model->get_Genre($name);
				$data['HeadTitle'] = $data['anime']->name." English Dubbed";
				$data['HeadDescription'] = "Watch english dubbed episodes of ".$data['anime']->name." for free!!";
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('anime', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
			}
	}
?>
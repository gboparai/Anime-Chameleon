<?php
	class Search extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}
	
			public function index()
			{
					
			}

			public function view($query)
			{
				$query = urldecode($query);
				$data['animes']= $this->anime_model->get_SearchAnime($query);
				$data['query']=$query;
				$data['HeadTitle']= "Search ". $query;
				$data['HeadDescription']= "Search english dubbed anime. Filter specific English dubbed anime series keywords.";
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('search', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
				
			}
	}
?>
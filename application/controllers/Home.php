<?php
	class Home extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}

			public function index()
			{
				$data['episodes'] = $this->anime_model->get_LatestEpisodes();
				$data['animes'] = $this->anime_model->get_LatestAnime();	
				$data['HeadTitle']= "Anime Chameleon - Watch English Dubbed Anime Online Free";
				$data['HeadDescription']= "Anime Chameleon is an Anime streaming site where you can Watch English Dub's of Anime's completely free";
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('home', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
			}
	}
?>
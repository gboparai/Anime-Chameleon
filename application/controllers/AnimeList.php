<?php
	class AnimeList extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}

			public function index()
			{
				$data['HeadTitle']= "Dubbed Anime Series";
				$data['HeadDescription']= "List of English Dubbed anime series available for viewing for free.";
				$data['animes'] = $this->anime_model->get_AllAnime();
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('list', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
			}
	}
?>
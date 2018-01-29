<?php
	class Genre extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}

			public function index()
			{
				$genres=$this->input->get('genres', TRUE);
				$data['genres'] = $genres;
				$data['animes']= $this->anime_model->get_SearchGenre($genres);
				$data['HeadTitle']= "Browse by Genres";
				$data['HeadDescription']= "Search english dubbed anime by genres. Filter specific english dubbed anime series by genres.";
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('genre', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
			}

			public function view($slug = NULL)
			{
				
			}
	}
?>
<?php
	class Episode extends CI_Controller {

			public function __construct()
			{
					parent::__construct();
					$this->load->model('anime_model');
					$this->load->helper('url_helper');
			}

			public function index()
			{
					
			}

			public function view($name, $number)
			{
				$name = urldecode($name);
				$data['episodes'] = $this->anime_model->get_Episodes($name);
				$data["currentEps"]= null;
				$data["nextEps"]= null;
				$data["prevEps"] = null;
				foreach($data['episodes'] as $episode){
					if($episode->number == $number){
						$data["currentEps"]=$episode;
					}
					if($episode->number == $number-1){
						$data["prevEps"]=$episode;
					}
					if($episode->number == $number+1){
						$data["nextEps"]=$episode;
					}
				}
				if(!$number == "Movie"){
					$data['HeadTitle'] = $data['currentEps']->nameAnime." Episode ".$data['currentEps']->number." English Dubbed";
					$data['HeadDescription'] = "Watch ".$data['currentEps']->nameAnime." Episode ".$data['currentEps']->number." English Dubbed for free!!";
				}
				else{
					$data['HeadTitle'] = $data['currentEps']->nameAnime." English Dubbed";
					$data['HeadDescription'] = "Watch ".$data['currentEps']->nameAnime." English Dubbed for free!!";
				}
				$this->load->view('head', $data);
				$this->load->view('header', $data);
				$this->load->view('episode', $data);
				$this->load->view('footer', $data);
				$this->load->view('foot', $data);
			}
	}
?>
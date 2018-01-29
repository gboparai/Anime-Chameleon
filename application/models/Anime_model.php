<?php
	class Anime_model extends CI_Model {

		public function __construct()
		{
				$this->load->database();
		}
	
		public function get_AllAnime()
		{
			$this->db->order_by('name', 'ASC');
			$query = $this->db->get('anime');
			return $query->result();
		}
		public function get_LatestAnime()
		{
			$query = $this->db->get('latest_anime');
			return $query->result();
		}
		public function get_LatestEpisodes()
		{
			$query = $this->db->get('latest_episode');
			return $query->result();
		}
		public function get_Anime($nameAnime)
		{
			$this->db->where('name', addslashes($nameAnime));
			$query = $this->db->get('anime');
			return $query->result();
		}
		public function get_Episode($number, $nameAnime)
		{
			return $this->db->get_where('episode', array('nameAnime' => $nameAnime, 'number' =>$number))->row();
		}
		public function get_Genre($nameAnime)
		{
			$this->db->where('nameAnime', addslashes($nameAnime));
			$query =$this->db->get('genre');
			return $query->result();
		}
		public function get_Episodes($nameAnime)
		{
			$this->db->where('nameAnime', addslashes($nameAnime));
			$query = $this->db->get('episode');
			return $query->result();
		}
		public function get_SearchAnime($query)
		{
			$this->db->like("name",$query);
			$result = $this->db->get('anime');
			return $result->result();
		}
		public function get_SearchGenre($genres)
		{
			$this->db->select('*');
			$this->db->from('genre');
			$this->db->join('anime', 'genre.idAnime = anime.id');
			$count=0;
			if($genres){
				$this->db->distinct();
				foreach($genres as $genre){
					if($count == 0){
						$this->db->where('genre', urldecode($genre));
					}
					else{
						$this->db->or_where('genre', urldecode($genre));
					}
					$count = $count+1;
				}
				$this->db->group_by('genre.idAnime');
				$this->db->having('COUNT(genre.idAnime)', $count);
				$result = $this->db->get();
				return $result->result();
			}
			else{
				return null;
			}
			
		}
	}
?>
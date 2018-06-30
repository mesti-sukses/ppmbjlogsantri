<?php
	/**
	 * Class ini yang akan menangani tafsir per ayat, mulai dari create edit dan deletenya
	 */
	class Quran extends Admin_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			$this->load->model('Quran_m');
			$this->load->model('Surat_m');
			$this->load->model('Tag_m');
			$this->load->model('Comment_m');
		}

		/**
		 * Method untuk menampilkan list tafsir yang sudah di tambahkan
		 * @return [type] [description]
		 */
		function index(){
			// Fetch the data
			$this->data['tafsirQuran'] = $this->Quran_m->get();

			// Load the page
			$title = "Tafsir List | R.A.T.E";
			$this->loadPage($title, 'admin/tafsir/list_tafsir', 'data_table');
		}


		// Method ini untuk mengedit tafsir
		function edit($id = NULL) {
			// Fetch the data
			// Ini untuk combo box list surat yang ada dalam database
			$this->data['listSurat'] = $this->Surat_m->get();
			// Jika variabel id ada berarti edit mode
			if($id)
				$this->data['currentTafsirQuran'] = $this->Quran_m->get($id, TRUE);

			// Get data from form
			$newTafsir = $this->form('Quran_m', array('surat', 'ayat', 'tag', 'content', 'halaman'));

			// Process data from form
			if($newTafsir){
				if($id)
					$newTafsir['id_tafsir'] = $id;

				// Proses tag yang diinput
				$tags = explode(',', $newTafsir['tag']);

				// Masukkan semuanya kedalam database tag
				foreach ($tags as $tag) {
					$newTags = (array)$this->Tag_m->get_by(array('nama' => $tag), TRUE);
					if($newTags == NULL){
						$newTags['nama'] = $tag;
						$newTags['jumlah'] = 1;
						$id_tag = NULL;
					} else {
						$id_tag = $newTags['id_tag'];
						$newTags['jumlah'] += 1;
					}

					$this->Tag_m->save($newTags, $id_tag);
				}

				$this->Quran_m->save($newTafsir, $id);
				redirect('quran');
			}

			// Load the page
			if($id)
				$title = "Tafsir Surat ".$this->data['currentTafsirQuran']->nama." Ayat ".$this->data['currentTafsirQuran']->ayat." | R.A.T.E";
			else 
				$title = "Tafsir Baru | R.A.T.E";
			$this->loadPage($title, 'admin/tafsir/edit_tafsir', 'admin_editor');
		}

		/**
		 * Untuk melihat tafsir yang ada pada ayat tertentu
		 * @param  int $id id dari tafsir yang bersangkutan
		 */
		function ayat($id){
			// Fetch data
			$this->data['tafsirAyat'] = $this->getComment($this->Quran_m->get($id, TRUE));

			// Process data tag
			$this->data['tafsirAyat']->link_tag = $this->processTag($this->data['tafsirAyat']->tag);

			// Get form feedback
			$newComment = $this->form('Comment_m', array('nama', 'komentar', 'id_tafsir'));

			if($newComment){

				$this->Comment_m->save($newComment);
				redirect('quran/ayat/'.$id, 'refresh');
			}

			// Load page
			$title = "Tafsir Surat ".$this->data['tafsirAyat']->nama." Ayat ".$this->data['tafsirAyat']->ayat." | R.A.T.E";
			$this->loadPage($title, 'admin/tafsir/view_tafsir', 'admin_editor', FALSE, FALSE, TRUE);
		}

		/**
		 * Untuk melihat tafsir dari ayat berdasarkan tag tertentu
		 * @param  string $name nama tag yang dicari
		 */
		function tag($name){
			// Fetch data
			$this->data['tafsirAyat'] = $this->Quran_m->get_like('tag', $name);

			// Process data tag
			for ($i=0; $i < count($this->data['tafsirAyat']); $i++) { 
				$this->data['tafsirAyat'][$i]->link_tag = $this->processTag($this->data['tafsirAyat'][$i]->tag);
			}

			// Load page
			$title = 'Tags '.$name.' | R.A.T.E';
			$this->loadPage($title, 'front/index', 'general_page', FALSE, FALSE, TRUE);
		}

		/**
		 * untuk memproses tag menjadi array dari link
		 * @param  string $tags string yang menjadi penanda dari tag dipisahkan dengan koma
		 * @return string       link yang di pisahkan oleh koma menuju halaman dari tag yang bersangkutan
		 */
		private function processTag($tags){
			$res = explode(',', $tags);
			for ($i=0; $i < count($res); $i++) { 
				$res[$i] = "<a href='".base_url('quran/tag/'.$res[$i])."'>".$res[$i]."</a>";
			}

			return implode(",", $res);
		}

		/**
		 * untuk mendapatkan comment dari database
		 * @param  class $post class yang masih mentah
		 * @return class       berupa class yang sudah ditambahkan comment dalam propertynya
		 */
		private function getComment($post){
			$comment = $this->Comment_m->get_by(array('id_tafsir' => $post->id_tafsir));
			$post->comment = $comment;
			return $post;
		}
	}
?>
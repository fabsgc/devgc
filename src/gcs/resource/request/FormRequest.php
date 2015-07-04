<?php
	namespace Controller\Request\Gcs;

	use \System\Request\Form;

	class FormRequest extends Form{
		public function post(){
			$this->validation->text('texte', 'champs de texte')
				->equal('post', 'Le champs doit avoir la valeur "post"');
		}

		public function put(){
			$this->validation->text('texte', 'champs de texte')
				->equal('put', 'Le champs doit avoir la valeur "put"');
		}
	}
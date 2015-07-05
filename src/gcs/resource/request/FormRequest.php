<?php
	namespace Controller\Request\Gcs;

	use Controller\Request\Plugin\captcha;
	use \System\Request\Form;

	class FormRequest extends Form{
		use captcha;

		public function post(){
			$this->captcha();
			$this->validation->text('text', 'champs de texte')
				->equal('post', 'Le champs doit avoir la valeur "post"');
		}

		public function put(){
			$this->captcha();
			$this->validation->text('text', 'champs de texte')
				->equal('put', 'Le champs doit avoir la valeur "put"');
		}
	}
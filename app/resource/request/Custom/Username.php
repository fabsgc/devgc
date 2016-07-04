<?php
	namespace Controller\Request\Custom;

	use System\Form\Validation\Custom\Custom;

	class Username extends Custom {
		public function filter() {
			if (strlen($this->value) < 9) {
				return false;
			}
			return true;
		}

		public function error() {
			return 'Votre pseudo doit faire au moins 9 caractères';
		}
	}
<?php
	namespace Orm\Entity\Custom;

	use System\Orm\Validation\Custom\Custom;
	
	class Title extends Custom{
		public function filter(){
			if(strlen($this->value) < 9)
				return false;
			return true;
		}
		public function error(){
			return 'Votre pseudo doit faire au moins 9 caractères';
		}
	}
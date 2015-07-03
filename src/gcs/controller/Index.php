<?php
	namespace gcs;

	use System\Controller\Controller;
	use System\Orm\Entity;

	class Index extends Controller{
		public function init(){
			if(ENVIRONMENT != 'development')
				self::Response()->status(404);
		}
		
		public function actionDefault(){
			return self::Template('index/default', 'gcsDefault')
				->show();
		}

		public static function extTemplate($content){
			return $content;
		}
	}
<?php
	namespace gcs;

	use Controller\Request\FormRequest;
	use System\Controller\Controller;
	use System\Orm\Entity;

	class Index extends Controller{
		public function init(){
			if(ENVIRONMENT != 'development')
				self::Response()->status(404);
		}
		
		public function actionDefault(){
			return self::Template('index/default', 'gcsDefault')
				->assign('title', 'GCsystem V'.VERSION)
				->show();
		}

		public function actionGet(){
			return self::Template('index/form', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->show();
		}

		public function actionPost(FormRequest $request){
			return self::Template('index/form', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->assign('request', $request)
				->show();
		}

		public function actionPut(FormRequest $request){
			return self::Template('index/form', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->assign('request', $request)
				->show();
		}

		public static function extTemplate($content){
			return $content;
		}
	}
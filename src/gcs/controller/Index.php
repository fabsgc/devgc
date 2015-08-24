<?php
	namespace Gcs;

	use Controller\Request\Gcs\FormRequest;
	use Orm\Entity\Article;
	use Orm\Entity\Post;
	use System\Controller\Controller;
	use System\Orm\Entity;

	class Index extends Controller{
		public function init(){
			if(ENVIRONMENT != 'development')
				self::Response()->status(404);
		}
		
		public function actionDefault(){
			/*$lines = $this->getFileLineDir('vendor/gcsystem/framework/core/');
			$lines += $this->getFileLineDir('app/');
			$lines += $this->getFileLineDir('src/');
			echo $lines;*/
			return self::Template('index/default', 'gcsDefault')
				->assign('title', 'GCsystem V'.VERSION)
				->show();
		}

		public function actionGet(){
			return self::Template('index/formPost', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->assign('articles', Article::find()->fetch())
				->show();
		}

		public function actionPost(Post $post){
			return self::Template('index/formPost', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->assign('post', $post)
				->assign('articles', Article::find()->fetch())
				->show();
		}

		public function actionPut(FormRequest $request, Article $article){
			return self::Template('index/form', 'formDefault')
				->assign('title', 'Injection Formulaire')
				->assign('request', $request)
				->assign('article', $article)
				->show();
		}

		public static function extTemplate($content){
			return $content;
		}

		public function getFileLineDir($dir){
			$line = 0;

			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
						if(is_dir($dir . $file)){
							if(strlen($file) > 2){
								$line += $this->getFileLineDir($dir . $file.'/');
							}
						}
						else if(pathinfo($dir . $file)['extension'] == 'php' || pathinfo($dir . $file)['extension'] == 'xml' || pathinfo($dir . $file)['extension'] == 'tpl'){
							echo $dir . $file.'<br />';
							$line += $this->countLines($dir . $file);
						}
					}

					closedir($dh);
				}
			}

			return $line;
		}

		public function countLines($filepath){
			$handle = fopen( $filepath, "r" );
			$count = 0;

			while( fgets($handle) ){
				$count++;
			}

			fclose($handle);
			return $count;
		}
	}
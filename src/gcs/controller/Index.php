<?php
	namespace Gcs;

	use Controller\Request\Gcs\FormRequest;
	use Orm\Entity\Article;
	use Orm\Entity\Post;
	use Orm\Entity\Student;
	use Orm\Entity\Course;
	use System\Controller\Controller;
	use System\Orm\Entity;
	use System\Collection\Collection;
	use System\Template\Template;

	class Index extends Controller{
		public function init(){
			if(ENVIRONMENT != 'development')
				self::Response()->status(404);
		}
		
		public function actionDefault(){
			$lines = $this->getFileLineDir('vendor/gcsystem/framework/');
			$lines += $this->getFileLineDir('app/');
			$lines += $this->getFileLineDir('src/');
			echo $lines;
			/*return self::Template('index/default', 'gcsDefault')
				->assign('title', 'GCsystem V'.VERSION)
				->show();*/

			//Article::find()->fetch();
			//Article::find()->fetch();
			//Article::find()->limit(0,200)->fetch();
			//print_r(Student::find()->fetch()->first());
			print_r(Student::find()->where('Student.id = 1')->fetch()->first());

			//print_r(Article::find()->fetch());

			/*for($i = 0; $i < 10; $i++){
				$article = new Article();
				$article->title = 'titre article'.$i;
				$article->content = 'contenu article';
				$article->insert();

				$entity = new Post();
				$entity->content = 'post'.$i;
				$entity->article = $article;
				$entity->article->title = 'test';
				$entity->article->content = 'content';
				$entity->file = new Entity\Type\File('README.md', file_get_contents('README.md'), 'text/plain');
				$entity->insert();
			}*/

			/*for($i = 0; $i < 25; $i++){
				$course = new Course();
				$course->name = 'mon cours';

				$student = new Student();
				$student->name = 'eleve 1';

				$collection = new Collection();
				$collection->add($student);

				$course->students = $collection;
				$course->insert();
			}*/
		}

		public function actionGet(){
			return (new Template('index/formPost', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('articles', Article::find()->fetch())
				->show();
		}

		public function actionPost(Post $post){
			return (new Template('index/formPost', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('post', $post)
				->assign('articles', Article::find()->fetch())
				->show();
		}

		public function actionPut(Post $post){
			return (new Template('index/formPost', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('post', $post)
				->assign('articles', Article::find()->fetch())
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
						if(is_array(pathinfo($dir . $file)))
							$extension = pathinfo($dir . $file);
						else
							$extension = '';

						if(isset($extension['extension']))
							$extension = $extension['extension'];

						if(is_dir($dir . $file)){
							if(strlen($file) > 2){
								$line += $this->getFileLineDir($dir . $file.'/');
							}
						}
						else if($extension == 'php' || $extension == 'xml' || $extension == 'tpl'){
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
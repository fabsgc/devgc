<?php
	namespace Gcs;

	use Controller\Request\Gcs\FormRequest;
	use Orm\Entity\Article;
	use Orm\Entity\Course;
	use Orm\Entity\Mydate;
	use Orm\Entity\Post;
	use Orm\Entity\Student;
	use System\Config\Config;
	use System\Controller\Controller;
	use System\Response\Response;
    use System\Session\Session;
    use System\Template\Template;

	/**
	 * Class Index
	 * @package Gcs
	 * @Before(class="\Gcs\Index", method="init")
	 * @Before(class="\Gcs\Index", method="base")
	 * @After(class="\Gcs\Index", method="end")
	 */

	class Index extends Controller {

		public function init() {
			if (Config::config()['user']['debug']['environment'] != 'development') {
				Response::instance()->status(404);
			}
		}

		public static function base(){
            echo 'base';
        }

		/**
		 * @Routing(name="index", url="(/*)", method="get,post,put")
		 */

		public function actionDefault() {
			//$articles = new Article();
			//$articles = Article::find()->fetch();
			//Post::find()->fetch();

			/** @var Course $course */
			//$course = Course::find()->where('Course.id = 55')->fetch()->first();
			/** @var Student $student */
			//$student = Student::find()->where('Student.id = 53')->fetch()->first();

			//$student = new Student();
			//$student->name = 'Nom';
			//$student->courses->add($course);
			//$student->insert();

			//$course->update();

			/** @var Mydate $mydate */
			//$mydate = new Mydate();
			//$mydate->date= new \DateTime('2011-01-01T15:03:01.012345Z');
			//$mydate->insert();

            //print_r(Mydate::find()->where('Mydate.id = 3')->fetch()->first());

			//$student->name = "dsfsdf";
			//$student->courses = new Collection([$course]);

			//$student->update();

			//print_r($student);

			/*$course = new Course();
			$course->name = 'course de merde';
			$course->insert();*/

			/** @var Post $post */
			//$post = Post::find()->where('Post.id = 1')->fetch()->first();

			//$article = Article::find()->where('Article.id = 2')->fetch()->first();

			//print_r($student);

			//$post->content ="sdsdklmfsdfsfsdf---";
			//$post->article = $article;
			//$post->update();

			/*return (new Template('index/default', 'gcsDefault'))
				->assign('title', 'GCsystem V' . VERSION)
				->show();*/
		}

		/**
		 * @Routing(name="get", url="/form(/*)", method="get")
		 */

		public function actionGet() {
			return (new Template('index/form', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('articles', Article::find()->fetch())
				->show();
		}

		/**
		 * @Routing(name="post", url="/form(/*)", method="post")
		 * @param FormRequest $request
		 * @return mixed
		 */

		public function actionPost(FormRequest $request) {
			return (new Template('index/form', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('request', $request)
				->assign('articles', Article::find()->fetch())
				->show();
		}

		/**
		 * @Routing(name="put", url="/form(/*)", method="put")
		 * @param FormRequest $request
		 * @return mixed
		 */

		public function actionPut(FormRequest $request) {
			return (new Template('index/form', 'formDefault'))
				->assign('title', 'Injection Formulaire')
				->assign('request', $request)
				->assign('articles', Article::find()->fetch())
				->show();
		}

		/**
		 * @Routing(name="hydrate", url="/form/hydrate(/*)")
		 * @param Post $post
		 * @return mixed
		 */

		public function actionHydrate(Post $post) {
			return (new Template('index/hydrate', 'formDefault'))
				->assign('title', 'Injection Formulaire - hydrate')
				->assign('post', $post)
				->show();
		}

		public static function extTemplate($content) {
			return $content;
		}

		public function getFileLineDir($dir) {
			$line = 0;
			if (is_dir($dir)) {
				if ($dh = opendir($dir)) {
					while (($file = readdir($dh)) !== false) {
						if (is_array(pathinfo($dir . $file))) {
							$extension = pathinfo($dir . $file);
						}
						else {
							$extension = '';
						}
						if (isset($extension['extension'])) {
							$extension = $extension['extension'];
						}
						if (is_dir($dir . $file)) {
							if (strlen($file) > 2) {
								$line += $this->getFileLineDir($dir . $file . '/');
							}
						}
						else if ($extension == 'php' || $extension == 'xml' || $extension == 'tpl') {
							echo $dir . $file . '<br />';
							$line += $this->countLines($dir . $file);
						}
					}
					closedir($dh);
				}
			}
			return $line;
		}
		
		public function countLines($filepath) {
			$handle = fopen($filepath, "r");
			$count = 0;
			while (fgets($handle)) {
				$count++;
			}
			fclose($handle);
			return $count;
		}
	}
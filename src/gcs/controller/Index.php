<?php
	namespace gcs;

	use Orm\Entity\Article;
	use Orm\Entity\Book;
	use Orm\Entity\Course;
	use Orm\Entity\Courseidstudentid;
	use Orm\Entity\Post;
	use Orm\Entity\Image;
	use Orm\Entity\Page;
	use Orm\Entity\Student;
	use System\Collection\Collection;
	use System\Controller\Controller;
	use System\Orm\Entity;

	class Index extends Controller{
		public function init(){
			if(ENVIRONMENT != 'development')
				self::Response()->status(404);
		}
		
		public function actionDefault(){
			/*$post = new Post();
			$data = $post->find()->fetch();
			print_r($data);

			$article = new Article();
			$data = $article->find()->fetch();

			$course = new Course();
			$data = $course->find()->fetch();*/

			//print_r($data);

			/*$t = self::Template('index/default', 'gcsDefault');
			return $t->show();*/

			/*$entity = new Courseidstudentid();

			$entity->course_id = new Course();
			$entity->course_id->name = 'cours x';

			$entity->student_id = new Student();
			$entity->student_id->name = 'eleve x';

			$entity->insert();*/

			/*$entity = new Post();
			$entity->content = 'post1';
			//$entity->article = Article::find()->where('Article.id = 1')->fetch()->first();
			$entity->article = new Article();
			$entity->article->title = 'test';
			$entity->article->content = 'content';
			$entity->file = new Entity\Type\File('README.md', file_get_contents('README.md'), 'text/plain');*/



			$entity = new Article();
			$entity->title = 'titre article';
			$entity->content = 'contenu article';

			$collection = new Collection();

			for($i = 0; $i<3; $i++){
				$post = new Post();
				$post->content = 'test '.$i;
				$post->file = new Entity\Type\File('README.md', file_get_contents('README.md'), 'text/plain');

				$collection->add($post);
			}

			/** @var \System\Orm\Entity\Entity $post */
			$post = Post::find()->where('Post.id = 132')->fetch()->first();

			$post2 = new Post();
			$post2->content = 'test 1000';
			$post2->file = new Entity\Type\File('README.md', file_get_contents('README.md'), 'text/plain');

			$collection2 = new Collection();
			$collection2->add($post2);
			$collection2->add($post2);

			$post->article->posts = $collection2;
			$post->article->update();

			//$post->update();

			//$post->file->content = $post->file->content.'salut';

			$collection->add($post);

			$entity->posts = $collection;

			self::Database()->db();

			//$entity->insert();

			//print_r(Post::find()->where('Article.id = 61')->fetch());

			/*$entity = new Course();
			$entity->name = 'mon cours';

			$collection = new Collection();

			$student = new Student();

			$collection->add($student);

			$entity->students = $collection;*/

			//$entity->insert();

			//return $t->show();
			
			/*$page = new Page();
			$page->image_id = new Image();
			$page->insert();*/

			/*$entity = new Course();
			$entity->name = 'mon cours';

			$collection = new Collection();

			$student = new Student();
			$student2 = new Student();
			$student3 = Student::find()->where('Student.id = 55')->fetch()->first();

			print_r($student3);

			$student->name = 'eleve 1';
			$student2->name = 'eleve 2';

			$collection->add($student);
			$collection->add($student2);
			$collection->add($student3);

			$entity->students = $collection;

			$entity->insert();*/

			/*$student = Student::find()->where('Course.id = 37 AND Student.id IN(2,25,26)')->fetch();

			$student25 = $student->filter(function($data) {
				if($data->id == 25) return true;
				return false;
			});

			//print_r($student25);
			echo '#####################################';
			print_r($student);*/

			/*$course->name = 'nom cours';
			$course2->name = 'nom cours 2';

			$collection->add($course);
			$collection->add($course2);

			$entity->courses = $collection;

			$entity->insert();*/
		}
	}
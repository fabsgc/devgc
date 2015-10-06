<?php
	namespace Orm\Entity;

	use System\Orm\Entity\Entity;
	use System\Orm\Entity\Field;
	use System\Orm\Entity\ForeignKey;

	/**
	 * @property integer id
	 * @property string content
	 * @property integer article
	 * @property \System\Orm\Entity\Type\File file
	*/

	class Post extends Entity{
		public function tableDefinition(){
			$this->name('post');
			$this->field('id')
				->primary(true)
				->type(Field::INCREMENT);
			$this->field('content')
				->type(Field::TEXT)
				->beNull(false);
			$this->field('article')
				->type(Field::INT)
				->beNull(false)
				->foreign(['type' => ForeignKey::MANY_TO_ONE, 'reference' => ['Article', 'id']]);
			$this->field('file')
				->type(Field::FILE)
				->beNull(false);
		}

		public function beforeInsert(){
			/*$this->validation->text('post.content', 'contenu')
				->different('', 'vous devez écrire quelque chose');

			$this->validation->file('post.file', 'fichier')
				->accept(['image/png'], 'le fichier doit être une image')
				->extension(['png'], 'le fichier n\'a pas la bonne extension');

			$this->validation->select('post.article', 'article')
				->sql(['query' => 'SELECT COUNT(*) FROM article where id = :value', 'constraint' => 1], 'cet article n\'existe pas');
			*/
		}
	}
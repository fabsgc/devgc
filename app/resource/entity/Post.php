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
				->foreign(ForeignKey::MANY_TO_ONE, ['Article', 'id']);
			$this->field('file')
				->type(Field::FILE)
				->beNull(false);
		}
	}
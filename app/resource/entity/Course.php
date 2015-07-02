<?php
	namespace Orm\Entity;

	use System\Orm\Entity\Entity;
	use System\Orm\Entity\Field;
	use System\Orm\Entity\ForeignKey;

	class Course extends Entity{
		public function tableDefinition(){
			$this->name('course');
			$this->field('id')
				->primary(true)
				->unique(true)
				->type(Field::INCREMENT);
			$this->field('name')
				->type(Field::STRING)
				->size(255)
				->beNull(false);
			$this->field('students')
				->foreign(ForeignKey::MANY_TO_MANY, ['Student', 'id'], ['Course', 'id']);
		}
	}
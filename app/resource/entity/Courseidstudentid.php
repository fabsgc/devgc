<?php
	namespace Orm\Entity;

	use System\Collection\Collection;
	use System\Orm\Entity\Entity;

	/**
	 * Class Courseidstudentid
	 * @Table(name="courseidstudentid")
	 * @Form(name="form-courseidstudentid")
	 * @property integer $id
	 * @property Student $student_id
	 * @property Course $course_id
	 * @property int $count
	 * @package Orm\Entity
	 */

	class Courseidstudentid extends Entity {

		/**
		 * @var int
		 * @Column(type="INCREMENT", primary="true")
		 */

		protected $id;

		/**
		 * @var Collection
		 * @Column(type="INT")
		 * @ManyToOne(to="Student.id")
		 */

		protected $student_id;

		/**
		 * @var Collection
		 * @Column(type="INT")
		 * @ManyToOne(to="Course.id")
		 */

		protected $course_id;

		/**
		 * @var int
		 * @Column(type="INT")
		 */

		protected $count;

		public function tableDefinition() {
			$this->name('courseidstudentid');
			$this->field('id')
				->primary(true)
				->unique(true)
				->type(Field::INCREMENT)
				->beNull(false);
			$this->field('student_id')
				->type(Field::INT)
				->beNull(false)
				->foreign(['type' => ForeignKey::MANY_TO_ONE, 'reference' => ['student', 'id']]);
			$this->field('course_id')
				->type(Field::INT)
				->beNull(false)
				->foreign(['type' => ForeignKey::MANY_TO_ONE, 'reference' => ['course', 'id']]);
			$this->field('count')
				->type(Field::INT)
				->beNull(false);
		}
	}
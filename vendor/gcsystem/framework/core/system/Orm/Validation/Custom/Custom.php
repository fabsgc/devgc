<?php
	/*\
	 | ------------------------------------------------------
	 | @file : Custom.php
	 | @author : fab@c++
	 | @description : custom validation
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Orm\Validation\Custom;

	use System\General\facades;

	abstract class Custom{
		use facades;

		/**
		 * the field name
		 * @var string $field
		 */

		protected $field;

		/**
		 * the field label
		 * @var string $label
		 */

		protected $label;

		/**
		 * the entity
		 * @var $value \System\Orm\Entity\Entity
		 */

		protected $entity;

		/**
		 * constructor
		 * @access public
		 * @param $field string
		 * @param $label string
		 * @param \System\Orm\Entity\Entity $entity
		 * @since 3.0
		 * @package System\Orm\Validation\Custom
		 */

		public function __construct($field, $label, $entity){
			$this->field = $field;
			$this->label = $label;
			$this->entity = $entity;
		}

		/**
		 * you can define your own form filter here
		 * @access public
		 * @return boolean
		 * @since 3.0
		 * @package System\Orm\Validation\Custom
		 */

		public function filter(){
			return true;
		}

		/**
		 * if the filter return false, the framework call this method to get the
		 * @access public
		 * @return string
		 * @since 3.0
		 * @package System\Orm\Validation\Custom
		 */

		public function error(){
			return '';
		}
	}
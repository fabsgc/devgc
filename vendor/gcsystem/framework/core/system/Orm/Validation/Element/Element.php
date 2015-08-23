<?php
	/*\
	 | ------------------------------------------------------
	 | @file : Element.php
	 | @author : fab@c++
	 | @description : orm validation element
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Orm\Validation\Element;

	use System\General\facades;

	abstract class Element{
		use facades;

		/**
		 * post, put, get data
		 * @var $_data array
		*/

		protected $_entity;

		/**
		 * @var $_field string
		*/

		protected $_field;

		/**
		 * @var $_label string
		*/

		protected $_label;

		/**
		 * @var $_errors array[]
		*/

		protected $_errors = array();

		/**
		 * @var $_constraints array[]
		*/

		protected $_constraints = array();

		/**
		 * constructor
		 * @access public
		 * @param $entity \System\Orm\Entity\Entity
		 * @param $field string
		 * @param $label string
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function __construct ($entity, $field, $label){
			$this->_entity = $entity;
			$this->_field = $field;
			$this->_label = $label;
		}

		/**
		 * constructor
		 * @access public
		 * @return void
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function check(){
			$this->_errors = array();
		}

		/**
		 * is valid
		 * @access public
		 * @return boolean
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function valid(){
			if(count($this->_errors) > 0)
				return false;
			else
				return true;
		}

		/**
		 * get errors
		 * @access public
		 * @return array
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function errors(){
			return $this->_errors;
		}

		/**
		 * destructor
		 * @access public
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function __destruct(){
		}
	}
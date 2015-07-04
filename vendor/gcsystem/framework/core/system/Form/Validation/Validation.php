<?php
	/*\
	 | ------------------------------------------------------
	 | @file : Validation.php
	 | @author : fab@c++
	 | @description : contain data from headers
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Form\Validation;

	use System\Form\Validation\Element\Text;

	class Validation{

		/**
		 * @var array
		*/

		protected $_errors = [];

		/**
		 * @var  \System\Form\Validation\Element\Element[]
		*/

		protected $_elements = [];

		/**
		 * constructor
		 * @access public
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function __construct (){
		}

		/**
		 * check a form request
		 * @access public
		 * @return void
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function check(){
			/** @var $element \System\Form\Validation\Element\Element */
			foreach($this->_elements as $element){
				$element->check();

				if($element->valid() == false){
					$this->_errors = array_merge($this->_errors, $element->errors());
				}
			}
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
		 * add text element
		 * @access public
		 * @param $field string
		 * @param $label string
		 * @return \System\Form\Validation\Element\Text
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function text($field, $label){
			$text = new Text($field, $label);
			array_push($this->_elements, $text);
			return $text;
		}

		/**
		 * destructor
		 * @access public
		 * @since 3.0
		 * @package System\Form\Validation
		*/

		public function __destruct(){
		}
	}
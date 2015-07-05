<?php
	/*\
	 | ------------------------------------------------------
	 | @file : Element.php
	 | @author : fab@c++
	 | @description : validation element
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Form\Validation\Element;

	use System\General\facades;

	abstract class Element{
		use facades;

		const CONSTRAINT_EQUAL = 0;

		/**
		 * post, put, get data
		 * @var $_data array
		*/

		protected $_data;

		/**
		 * @var $_field string
		*/

		protected $_field;

		/**
		 * @var $_label string
		*/

		protected $_label;

		/**
		 * @var $_exist boolean
		*/

		protected $_exist = true;

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
		 * @param $field string
		 * @param $label string
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function __construct ($field, $label){
			$requestData = self::RequestData();

			switch($requestData->method){
				case 'get' :
					$this->_data = $requestData->get;
				break;

				case 'post' :
					$this->_data = $requestData->post;
				break;

				case 'put' :
					$this->_data = $requestData->post;
				break;

				case 'delete' :
					$this->_data = $requestData->post;
				break;
			}

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
		 * the field must be equal to
		 * @access public
		 * @param $equal string
		 * @param $error string
		 * @return \System\Form\Validation\Element\Text
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function equal($equal, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::CONSTRAINT_EQUAL,
					'value' => $equal,
					'message' => $error
				]);
			}

			return $this;
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
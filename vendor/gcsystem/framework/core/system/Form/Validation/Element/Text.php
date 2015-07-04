<?php
	/*\
	 | ------------------------------------------------------
	 | @file : Input.php
	 | @author : fab@c++
	 | @description : input text validation
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Form\Validation\Element;

	use System\General\facades;

	class Text extends Element{
		use facades;

		const CONSTRAINT_EQUAL = 0;

		/**
		 * constructor
		 * @access public
		 * @param $field string
		 * @param $label string
		 * @return \System\Form\Validation\Element\Text
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function __construct ($field, $label){
			parent::__construct($field, $label);

			if(!isset($this->_data[$field])){
				array_push($this->_errors, [
					'field' => $this->_label,
					'message' =>self::Lang()->lang('.app.system.form.exist')
				]);

				$this->_exist = false;
			}

			return $this;
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
		 * constructor
		 * @access public
		 * @return void
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function check(){
			foreach($this->_constraints as $constraint){
				switch($constraint['type']){
					case self::CONSTRAINT_EQUAL:
						if($this->_data[$this->_field] != $constraint['value']){
							array_push($this->_errors, [
								'field' => $this->_label,
								'message' => $constraint['message']
							]);
						}
					break;
				}
			}
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
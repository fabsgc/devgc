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
		 * check validity
		 * @access public
		 * @return void
		 * @since 3.0
		 * @package System\Form\Validation\Element
		*/

		public function check(){
			parent::check();

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
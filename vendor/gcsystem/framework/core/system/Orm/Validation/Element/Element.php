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

	use System\Exception\MissingClassException;
	use System\General\facades;

	abstract class Element{

		const EQUAL         =  0;
		const DIFFERENT     =  1;
		const MORETHAN      =  2;
		const LESSTHAN      =  3;
		const BETWEEN       =  4;
		const IN            =  5;
		const NOTIN         =  6;

		const LENGTH        =  7;
		const LENGTHMIN     =  8;
		const LENGTHMAX     =  9;
		const LENGTHIN      = 10;
		const LENGTHBETWEEN = 11;

		const REGEX         = 12;
		const URL           = 13;
		const MAIL          = 14;
		const INT           = 15;
		const FLOAT         = 16;
		const ALPHA         = 17;
		const ALPHANUM      = 18;
		const ALPHADASH     = 19;
		const IP            = 20;
		const SQL           = 21;

		const COUNT         = 22;
		const COUNTMIN      = 23;
		const COUNTMAX      = 24;
		const COUNTIN       = 25;
		const COUNTBETWEEN  = 26;

		const ACCEPT        = 27;
		const EXTENSION     = 28;
		const SIZE          = 29;
		const SIZEMIN       = 30;
		const SIZEMAX       = 31;
		const SIZEBETWEEN   = 32;

		const EXIST         = 33;
		const NOTEXIST      = 34;

		const CUSTOM        = 35;

		/**
		 * entity name
		 * @var $_entity \System\Orm\Entity\Entity
		*/

		protected $_entity;

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

		/**
		 * the field must be equal to
		 * @access public
		 * @param $equal string
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function equal($equal, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::EQUAL,
					'value' => $equal,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must be different from
		 * @access public
		 * @param $different string
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function different($different, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::DIFFERENT,
					'value' => $different,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field value must be more than
		 * @access public
		 * @param $moreThan integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function moreThan($moreThan, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::MORETHAN,
					'value' => $moreThan,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field value must be less than
		 * @access public
		 * @param $lessThan integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function lessThan($lessThan, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LESSTHAN,
					'value' => $lessThan,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field value must be between
		 * @access public
		 * @param $between integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function between($between, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::BETWEEN,
					'value' => $between,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field value must be in
		 * @access public
		 * @param $in integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function in($in, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::IN,
					'value' => $in,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field value must not be in
		 * @access public
		 * @param $notIn integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function notIn($notIn, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::NOTIN,
					'value' => $notIn,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must be
		 * @access public
		 * @param $length integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function length($length, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LENGTH,
					'value' => $length,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must more than
		 * @access public
		 * @param $lengthMin integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function lengthMin($lengthMin, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LENGTHMIN,
					'value' => $lengthMin,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must be less than
		 * @access public
		 * @param $lengthMax integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function lengthMax($lengthMax, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LENGTHMIN,
					'value' => $lengthMax,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must be less than
		 * @access public
		 * @param $lengthIn integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function lengthIn($lengthIn, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LENGTHIN,
					'value' => $lengthIn,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must be less than
		 * @access public
		 * @param $lengthBetween integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function lengthBetween($lengthBetween, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::LENGTHBETWEEN,
					'value' => $lengthBetween,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field size must be less than
		 * @access public
		 * @param $regex string
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function regex($regex, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::REGEX,
					'value' => $regex,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must be an email address
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function mail($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::MAIL,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must be an int
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function int($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::INT,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must be a float
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function float($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::FLOAT,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must contains only letters
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function alpha($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::ALPHA,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must contain only letters and numerics
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function alphaNum($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::ALPHANUM,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must contain only letters, numerics ans underscore
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function alphaDash($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::ALPHADASH,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must be an ip
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function ip($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::IP,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * the field must valid the query
		 * @access public
		 * @param $sql string[]
		 *   query => string
		 *   vars  => array (:value => field value directly added to vars)
		 *   constraint => (>,<,==,!=)
		 *   value => string
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function sql($sql, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::SQL,
					'value' => $sql,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * When the field value is an array, it must contain N lines
		 * @access public
		 * @param $count integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function count($count, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::COUNT,
					'value' => $count,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * When the field value is an array, it must contain at least N lines
		 * @access public
		 * @param $countMin integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function countMin($countMin, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::COUNTIN,
					'value' => $countMin,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * When the field value is an array, it must contain less than N+1 lines
		 * @access public
		 * @param $countMax integer
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function countMax($countMax, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::COUNTMAX,
					'value' => $countMax,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * When the field value is an array, its value must be in
		 * @access public
		 * @param $countIn integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function countIn($countIn, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::COUNTIN,
					'value' => $countIn,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * When the field value is an array, its value must be between
		 * @access public
		 * @param $countBetween integer[]
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function countBetween($countBetween, $error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::COUNTBETWEEN,
					'value' => $countBetween,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * The field must exist
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function exist($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::EXIST,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * The field must not exist
		 * @access public
		 * @param $error string
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function notExist($error){
			if($this->_exist){
				array_push($this->_constraints, [
					'type' => self::NOTEXIST,
					'message' => $error
				]);
			}

			return $this;
		}

		/**
		 * custom filter made by the user
		 * @access public
		 * @param $name string
		 * @throws MissingClassException
		 * @return \System\Orm\Validation\Element\Element
		 * @since 3.0
		 * @package System\Form\Validation\Element
		 */

		public function custom($name){
			if($this->_exist) {
				$class = '\Entity\Custom\\' . ucfirst($name);

				if (class_exists($class)) {
					array_push($this->_constraints, [
						'type' => self::CUSTOM,
						'value' => new $class($this->_field, $this->_label, $this->_data[$this->_field])
					]);
				} else {
					throw new MissingClassException('The custom validation class "' . $class . '" was not found');
				}
			}

			return $this;
		}

		public function __destruct(){
		}
	}
<?php
	/*\
	 | ------------------------------------------------------
	 | @file : MethodNotAllowedException.php
	 | @author : fab@c++
	 | @description : overriding of php exceptions
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/
	
	namespace System\Exception;

	class AttributeNotAllowedException extends Exception{
		public function getType(){
			return 'AttributeNotAllowedException';
		}
	}
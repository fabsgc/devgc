<?php
	/*\
	 | ------------------------------------------------------
	 | @file : autoload.php
	 | @author : fab@c++
	 | @description : automatic inclusion
	 | @version : 3.0 Bêta
	 | ------------------------------------------------------
	\*/

	namespace System;

	use System\Exception\Exception;
	use System\General\facades;

	require_once(APP_FUNCTION);
	require_once(CLASS_GENERAL);

	class Autoload{
		use facades;

		/**
		 * Autoloader for classes
		 * @param $class string
		 * @throws Exception
		 * @return void
		*/

		public static function load($class){
			$class = preg_replace('#'.preg_quote('\\').'#isU', '/', $class);

			if(file_exists(SYSTEM_CORE_PATH.$class.'.php')){
				include_once(SYSTEM_CORE_PATH.$class.'.php');
				return;
			}

			if(file_exists(APP_RESOURCE_EVENT_PATH.$class.EXT_EVENT.'.php')){
				include_once(APP_RESOURCE_EVENT_PATH.$class.EXT_EVENT.'.php');
				return;
			}
			
			if(file_exists(APP_RESOURCE_PATH.lcfirst(str_replace('Orm/', '', $class)).EXT_ENTITY.'.php')){
				include_once(APP_RESOURCE_PATH.lcfirst(str_replace('Orm/', '', $class)).EXT_ENTITY.'.php');
				return;
			}

			if(file_exists(SRC_PATH.$class.EXT_CONTROLLER.'.php')){
				include_once(SRC_PATH.$class.EXT_CONTROLLER.'.php');
				return;
			}

			if(file_exists(SRC_PATH.preg_replace('#(.*)\/(.*)#isU', '$1/'.SRC_CONTROLLER_PATH.'$2', $class).EXT_CONTROLLER.'.php')){
				include_once(SRC_PATH.preg_replace('#(.*)\/(.*)#isU', '$1/'.SRC_CONTROLLER_PATH.'$2', $class).EXT_CONTROLLER.'.php');
				return;
			}

			if(file_exists(SRC_PATH.preg_replace('#(.*)\/(.*)#isU', '$1/'.SRC_MODEL_PATH.'$2', $class).EXT_MODEL.'.php')){
				include_once(SRC_PATH.preg_replace('#(.*)\/(.*)#isU', '$1/'.SRC_MODEL_PATH.'$2', $class).EXT_MODEL.'.php');
				return;
			}

			if ($handle = opendir(SRC_PATH)) {
				while (false !== ($entry = readdir($handle))) {
					if($entry != '..' && is_dir($entry)){
						if(file_exists(SRC_PATH.$entry.SRC_RESOURCE_EVENT_PATH.$class.EXT_ENTITY.'.php')){
							include_once(SRC_PATH.$entry.SRC_RESOURCE_EVENT_PATH.$class.EXT_ENTITY.'.php');
							return;
						}
					}
				}

				closedir($handle);
			}

			if(file_exists(APP_RESOURCE_REQUEST_PATH.preg_replace('#Controller\/Request\/#isU', '', $class).'.php')){
				include_once(APP_RESOURCE_REQUEST_PATH.preg_replace('#Controller\/Request\/#isU', '', $class).'.php');
				return;
			}

			if ($handle = opendir(SRC_PATH)) {
				while (false !== ($entry = readdir($handle))) {
					if(file_exists(SRC_PATH.$entry.'/'.SRC_RESOURCE_REQUEST_PATH.preg_replace('#Controller\/Request\/#isU', '', $class).'.php')){
						include_once(SRC_PATH.$entry.'/'.SRC_RESOURCE_REQUEST_PATH.preg_replace('#Controller\/Request\/#isU', '', $class).'.php');
						return;
					}
				}

				closedir($handle);
			}

			throw new Exception('Class "'.$class.'" not found');
		}
	}

	spl_autoload_register(__NAMESPACE__ . "\\Autoload::load");
<?php
	/*\
	 | ------------------------------------------------------
	 | @file : TerminalClear.php
	 | @author : fab@c++
	 | @description : terminal command clear
	 | @version : 3.0 bêta
	 | ------------------------------------------------------
	\*/

	namespace System\Terminal;

	/**
	 * Class TerminalClear
	 * @package System\Terminal
	 */

	class TerminalClear extends TerminalCommand {
		
		/**
		 * return void
		 * @access public
		 */

		public function log() {
			Terminal::rrmdir(APP_LOG_PATH, false, ['.gitignore']);
			echo ' - log files were successfully deleted';
		}

		/**
		 * return void
		 * @access public
		 */

		public function cache() {
			Terminal::rrmdir(APP_CACHE_PATH, false, ['.gitignore']);
			echo ' - cache files were successfully deleted';
		}
	}
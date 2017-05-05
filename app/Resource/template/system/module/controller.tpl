{$php}

	namespace {$src};

	use System\Controller\Controller;

	/**
	 * Class Index
	 * @package {$src}

	 * @Before(class="\{$src}\{$controller}", method="init")
	 */

	class {$controller} extends Controller{

		/**
		 * @Routing(name="{lcfirst($src)}-{strtolower($controller)}-default", url="/{lcfirst($src)}/{strtolower($controller)}/default(/*)", method="*")
		 */

		public function actionDefault(){
			return $this->showDefault();
		}
	}
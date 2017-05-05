<?php
namespace Src\Gcs\Controller;

use Gcs\Framework\Core\Controller\Controller;

/**
 * Class Index
 * @package Gcs
 * @Before(class="\Gcs\Test", method="init")
 */

class Test extends Controller{

    /**
     * @Routing(name="gcs-test-default", url="/gcs/test/default(/*)", method="*")
    */

    public function actionDefault(){
        return $this->showDefault();
    }
}
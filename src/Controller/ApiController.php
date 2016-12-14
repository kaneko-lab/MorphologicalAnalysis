<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Constant\RESULT_CODE;
use App\Controller\AppController;
use App\Service\AuthService;
use App\Service\MorphologicalAnalysisService;
use App\Service\ParameterService;
use App\ValueObject\ServiceResult;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class ApiController extends AppController
{



    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        parent::beforeRender($event);
    }

    public function test()
    {
        echo "TEST API";
    }


    /**
     *
     */
    public function getParsedMessage(){
        $id = $this->request->data('id');
        $auth = $this->request->data('auth');
        $auth = "Xidkexo121xlaAadkxidg";

        $lang = $this->request->data('lang');

        $message = $this->request->data('message');

        $authService = new AuthService();
        if(!$authService->isValidAuth($auth)){
            return $this->responseResult($authService->getServiceResult());
        };

        $morphologicalAnalysisService = new MorphologicalAnalysisService();
        $morphologicalAnalysisService->setLang($lang);
        $morphologicalAnalysisService->setMessage($message);
        $morphologicalAnalysisService->doAnalysis();

        return $this->responseResult($morphologicalAnalysisService->getServiceResult());

    }



    /**
     * @param $data
     */
    private function responseResult(ServiceResult $data)
    {
        $this->set('RESULT',$data->getArray());
    }
}

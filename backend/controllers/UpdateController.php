<?php

namespace backend\controllers;

use linslin\yii2\curl;

/**
 * Description of TestController
 *
 * @author UTEHN
 */
class UpdateController extends \yii\web\Controller {

    public function actionCheckver(){
        $curl = new curl\Curl();
        $ver = $curl->get("http://203.157.118.117/dhdc_version/version.txt");
        $ver = explode(',', $ver);
        return "frontend:$ver[0],backend:$ver[1],databases:$ver[2]";
    }


}

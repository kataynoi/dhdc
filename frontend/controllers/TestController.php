<?php

namespace frontend\controllers;
use Yii;

class TestController extends \yii\web\Controller {

    public function actionTest1(){
        $sql = Yii::getAlias('@databases/sys_month.sql');
        echo file_get_contents($sql);
    }
}
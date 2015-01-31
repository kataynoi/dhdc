<?php

namespace backend\controllers;

class SettimeController extends \yii\web\Controller
{
   public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->render('index');
    }

}

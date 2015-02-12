<?php

namespace frontend\controllers;

class ScreenController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}

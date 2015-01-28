<?php

namespace backend\controllers;

class ExecuteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
    public function actionExecute(){
        $sql = "call all_exceute;";
        \Yii::$app->db->createCommand($sql)->execute();        
        
    }

}

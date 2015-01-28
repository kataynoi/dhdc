<?php

namespace backend\controllers;

class ExecuteController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $sql = "show processlist;";
        
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        
        //return;
        
        $dataProvider = new \yii\data\ArrayDataProvider([
           // 'key' => 'hoscode',
            'allModels' => $rawData,
            'sort' => count($rawData)>0?['attributes' => array_keys($rawData[0])]:[],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }
    
    
    public function actionExecute(){
        
        $sql = "call all_execute;";
        
        \Yii::$app->db->createCommand($sql)->execute();        
        
    }

}

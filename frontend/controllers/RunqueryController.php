<?php

namespace frontend\controllers;

use yii\base\ErrorException;

class RunqueryController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {


        if (\Yii::$app->request->isPost) {
          
            $sql = trim($_POST['sql_code']);

            try {
                $rawData=\Yii::$app->db->createCommand($sql)->queryAll();
            } catch (\yii\db\Exception $e) {
                throw  new \yii\web\ConflictHttpException;
            }



            $dataProvider = new \yii\data\ArrayDataProvider([
                //'key' => 'hoscode',
                'allModels' => $rawData,
                
                'pagination' => FALSE,
            ]);

            return $this->render('index', [
                        'dataProvider' => $dataProvider,
                        'sql_code'=>$sql
            ]);
        }

        return $this->render('index');
    }

    public function actionResult() {
        
    }

}

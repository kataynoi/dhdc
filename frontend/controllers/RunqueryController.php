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
           
            $break = FALSE;

            if ('delete' === substr($sql, 0, 6)) {
                $break = true;
            }
            if ('insert' === substr($sql, 0, 6)) {
                 $break = true;
            }

            if ('update' === substr($sql, 0, 6)) {
                $break = true;
            }

            if ('alter' === substr($sql, 0, 5)) {
                 $break = true;
            }
            if ('drop' === substr($sql, 0, 4)) {
                 $break = true;
            }
            if ('show' === substr($sql, 0, 4)) {
                 $break = true;
            }
            if ($break) {
                throw new \yii\web\ConflictHttpException;
                
            }

            try {
                $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
            } catch (\yii\db\Exception $e) {
                throw new \yii\web\ConflictHttpException;
            }



            $dataProvider = new \yii\data\ArrayDataProvider([
                //'key' => 'hoscode',
                'allModels' => $rawData,
                'pagination' => FALSE,
            ]);

            return $this->render('index', [
                        'dataProvider' => $dataProvider,
                        'sql_code' => $sql
            ]);
        }

        return $this->render('index');
    }

    public function actionResult() {
        
    }

}

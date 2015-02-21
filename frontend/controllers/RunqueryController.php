<?php

namespace frontend\controllers;

use yii;
use yii\filters\VerbFilter;
use yii\base\ErrorException;

class RunqueryController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function behaviors() {

        $role = 0;
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;
        }
        $arr = [''];
        if ($role == 1) {
            $arr = ['index', 'result'];
        }
        if ($role == 2) {
            $arr = ['index', 'result'];
        }

        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
                },
                'only' => ['index', 'result'],
                'rules' => [
                    [
                        'allow' => FALSE,
                        'actions' => $arr,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => $arr,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex() {

        $saved = false;
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
            if ('trun' === substr($sql, 0, 4)) {
                $break = true;
            }
            if ('empty' === substr($sql, 0, 5)) {
                $break = true;
            }
            if ('create' === substr($sql, 0, 6)) {
                $break = true;
            }
            if ('replace' === substr($sql, 0, 7)) {
                $break = true;
            }

            if ($break) {
                throw new \yii\web\ConflictHttpException('ไม่อนุญาตคำสั่งนี้');
            }

            try {
                $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
            } catch (\yii\db\Exception $e) {
                throw new \yii\web\ConflictHttpException('SQL ERROR');
            }

            if (isset($_POST['save'])) {

                $model = new \frontend\models\Sqlscript();
                $model->topic = 'กรุณาแก้ชื่อ script';
                $model->sql_script = $sql;
                $model->user = Yii::$app->user->identity->username;
                $model->d_update = date('Y-m-d H:i:s');
                if ($model->save()) {
                    $saved = true;
                }
            }



            $dataProvider = new \yii\data\ArrayDataProvider([
                //'key' => 'hoscode',
                'allModels' => $rawData,
                'pagination' => FALSE,
            ]);



            return $this->render('index', [
                        'dataProvider' => $dataProvider,
                        'sql_code' => $sql,
                        'saved' => $saved ? '[บันทึก script แล้ว]' : ''
            ]);
        }

        return $this->render('index',[
            'saved'=>''
        ]);
    }

    public function actionResult() {
        
    }

}

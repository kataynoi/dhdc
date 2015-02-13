<?php

namespace frontend\controllers;

class OpdController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {//ผู้มารับบริการผู้ป่วยนอก คน/ครั้ง
        $selyear = date('Y');
        $sql = "call count_service($selyear);";
        if (!empty($_POST['selyear'])) {
            $selyear = $_POST['selyear'];
            $sql = "call count_service($selyear);";
        }

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);

        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'selyear' => $selyear
        ]);
    }

}

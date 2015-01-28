<?php

namespace frontend\controllers;

use \backend\models\Sysconfigmain;

class SummaryController extends \yii\web\Controller {

    public function actionIndex() {
        $config_main = Sysconfigmain::find()->one();
        $prov = $config_main->provcode;
        $amp = $config_main->distcode;
        $_year = '2014';

        $sql = "select * from s_count_file";

        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        
        //return;
        
        $dataProvider = new \yii\data\ArrayDataProvider([
            'key' => 'hoscode',
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

}

<?php

namespace backend\controllers;

class ExecuteController extends \yii\web\Controller {

    public function actionIndex() {
        $sql = "show processlist;";
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();

        $dataProvider = new \yii\data\ArrayDataProvider([
            // 'key' => 'hoscode',
            'allModels' => $rawData,
            'sort' => count($rawData) > 0 ? ['attributes' => array_keys($rawData[0])] : [],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

    public function actionExecute() {


        $running = \backend\models\SysProcessRunning::find()->one();


        if ($running->is_running == 'false') {
            $running->is_running = 'true';
            $running->update();

            $this->run_count_all();
            
            $running->is_running = 'false';
            $running->update();
        }
    }

    protected function run_count_all($ym = '201410') {


        $sql = "call run_sys_count_all($ym);";

        \Yii::$app->db->createCommand($sql)->execute();
    }

}

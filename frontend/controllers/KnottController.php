<?php

namespace frontend\controllers;

class KnottController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPanthai_1() {

        $sql = "select i.diseasethai as disease,count(distinct d.pid) as persons,count(DISTINCT d.seq) as times
from diagnosis_opd d,cdisease i
where d.DIAGCODE=i.diagcode 
and d.DIAGCODE LIKE 'u%'
group by d.DIAGCODE
order by times DESC
limit 10";
        
        
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

        return $this->render('panthai_1', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

}

//จบ controller

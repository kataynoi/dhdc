<?php

namespace frontend\controllers;

use Yii;
use frontend\models\SysCountAll;
use frontend\models\SysCountAllSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SyscountallController implements the CRUD actions for SysCountAll model.
 */
class SyscountallController extends Controller {

    public function actionIndex() {
        $sql = "SELECT  t.hospcode,sum(t.person) as person,sum(t.death) as death,
sum(t.service) as service
from sys_count_all t where t.hospcode in (select hoscode from chospital_amp)
GROUP BY t.hospcode";

        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        $dataProvider = new \yii\data\ArrayDataProvider([
            'key' => 'hospcode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    
        ]);
    }

    public function actionIndex2() {
        $searchModel = new SysCountAllSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$searchModel->month = date('Ym');
        //$dataProvider->month = date('Ym');
        //$searchModel->hospcode=$hospcode;

        return $this->render('index2', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

}

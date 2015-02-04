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
class SyscountallController extends Controller
{
   
     
    public function actionIndex()
    {
        $searchModel = new SysCountAllSearch();
       
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
         //$searchModel->month = date('Ym');
         //$dataProvider->month = date('Ym');
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    


}

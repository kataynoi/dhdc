<?php

namespace frontend\controllers;

class KnottController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPanthai_1() {
        $sql = "select * from knott_panthai_1";


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

    public function actionPanthai_2() {
        $sql = "select * from knott_panthai_2";


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
        return $this->render('panthai_2', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

    

    public function actionPanthai_4() {
        
         $sql = "SELECT sm.`month`,d.HOSPCODE,amp.hosname,count(d.SEQ) as total,
sum(if(d.DIAGCODE like 'u%',1,0)) as panthai_diag,
round(((sum(if(d.DIAGCODE like 'u%',1,0)))/(count(d.SEQ)))*100,2) as percent
from diagnosis_opd d,sys_month sm,chospital_amp amp 
where concat(year(d.DATE_SERV),month(d.DATE_SERV))=sm.`month` and d.HOSPCODE=amp.hoscode
GROUP BY d.HOSPCODE,concat(year(DATE_SERV),month(DATE_SERV)) 
ORDER BY d.HOSPCODE,concat(year(DATE_SERV),month(DATE_SERV))";
         
        if(\Yii::$app->request->post()){
            $year = $_POST['year'];
              $sql = "SELECT sm.`month`,d.HOSPCODE,amp.hosname,count(d.SEQ) as total,
sum(if(d.DIAGCODE like 'u%',1,0)) as panthai_diag,
round(((sum(if(d.DIAGCODE like 'u%',1,0)))/(count(d.SEQ)))*100,2) as percent
from diagnosis_opd d,sys_month sm,chospital_amp amp 
where concat(year(d.DATE_SERV),month(d.DATE_SERV))=sm.`month` and d.HOSPCODE=amp.hoscode
and sm.month like '$year%' 
GROUP BY d.HOSPCODE,concat(year(DATE_SERV),month(DATE_SERV)) 
ORDER BY d.HOSPCODE,concat(year(DATE_SERV),month(DATE_SERV))";
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

        return $this->render('panthai_4', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'select_year'=>  isset($_POST['year'])?$_POST['year']:''
        ]);
    }

}

//จบ controller

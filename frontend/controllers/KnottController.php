<?php

namespace frontend\controllers;

class KnottController extends \yii\web\Controller {

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

        $sql = "select d.PROCEDCODE,i.desc_r as oper,count(distinct d.pid) as person,count(DISTINCT d.seq) as visit
from procedure_opd d,cicd9ttm_planthai i
where d.PROCEDCODE=i.`code` and d.DATE_SERV 
group by d.PROCEDCODE
order by visit DESC
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

        return $this->render('panthai_2', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }
    
            public function actionPanthai_3() {

        $sql = "SELECT concat(ins.instypecode,' : ',ins.instypename) as 'right',count(p.PID) as person
FROM person p,card c,cinstype_new ins
where (p.HOSPCODE=c.HOSPCODE and p.PID=c.PID) and c.INSTYPE_NEW=ins.instypecode 
and p.TYPEAREA in ('1','3') and p.DISCHARGE=9 
GROUP BY c.INSTYPE_NEW
UNION
SELECT 'Total' as 'right',count(p.PID) as person
FROM person p,card c,cinstype_new ins
where (p.HOSPCODE=c.HOSPCODE and p.PID=c.PID) and c.INSTYPE_NEW=ins.instypecode 
and p.TYPEAREA in ('1','3') and p.DISCHARGE=9";
        
        
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

        return $this->render('panthai_3', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

 
}

//จบ controller

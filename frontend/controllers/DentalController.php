<?php

namespace frontend\controllers;
use Yii;

class DentalController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "select h.hoscode,
h.hosname,
(select count(distinct p.CID) as num
from
anc as a,
person as p 
where a.PID = p.PID 
and p.HOSPCODE = a.HOSPCODE
and p.NATION='099' and p.DISCHARGE='9' and p.TYPEAREA in ('1','3') 
and a.DATE_SERV between '$date1' and '$date2'  
and p.HOSPCODE=h.hoscode) as target,
(select
count(distinct p.CID)
from
procedure_opd as pd ,
anc as a ,
person as p ,
dental as d
where 
a.PID = p.PID 
and p.HOSPCODE = a.HOSPCODE 
and pd.PROCEDCODE='2330011'
and d.PID=a.PID
and d.HOSPCODE=a.HOSPCODE 
and d.SEQ = pd.SEQ  
and d.PID=pd.PID 
and d.HOSPCODE = pd.HOSPCODE 
and a.DATE_SERV between '$date1' and '$date2' 
and p.NATION='099' and p.DISCHARGE='9' and p.TYPEAREA in ('1','3')  
and p.HOSPCODE=h.hoscode) as output
from
chospital_amp AS h
order by h.hoscode";



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
                    'sql' => $sql,
                    'date1' => $date1,
                    'date2' => $date2
        ]);
    }

}

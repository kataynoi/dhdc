<?php

namespace frontend\controllers;

class KukksController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {//หน้ารวม
        return $this->render('index');
    }

    public function actionReport1() {//ร้อยละผู้ป่วยโรคเรื้อรังได้รับการเยี่ยมบ้าน
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        
        $sql = "select h.hoscode,h.hosname,
(select COUNT(DISTINCT p_target.cid) from 
(SELECT
p.cid,p.HOSPCODE
FROM
chronic as c
join person as p on p.PID=c.PID and p.HOSPCODE=c.HOSPCODE
and c.TYPEDISCH='03'
GROUP BY p.CID) as p_target
where p_target.HOSPCODE=h.hoscode
GROUP BY p_target.HOSPCODE) as chronic,
(select count(distinct hhv.CID) as num from 
(SELECT
comserv.HOSPCODE,
comserv.PID,
comserv.SEQ,
comserv.DATE_SERV,
comserv.COMSERVICE,
p.CID
FROM
community_service as comserv
,person as p
where p.PID=comserv.PID and p.HOSPCODE=comserv.HOSPCODE
and comserv.DATE_SERV between $date1 and $date2 
and comserv.COMSERVICE like '1A%'
group by p.CID) as hhv where hhv.HOSPCODE=h.hoscode) as comm_serv
from chospital_amp h";

        

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
        $dataProvider=[];
        return $this->render('report1', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

}

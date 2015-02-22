<?php

namespace frontend\controllers;

use Yii;

class KukksController extends \yii\web\Controller {

    public $enableCsrfValidation = false;
    
      

    public function actionIndex() {//หน้ารวม
        return $this->render('index');
    }

    public function actionReport1() {//ร้อยละผู้ป่วยโรคเรื้อรังได้รับการเยี่ยมบ้าน
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

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
and comserv.DATE_SERV between '$date1' and '$date2' 
and comserv.COMSERVICE like '1A%'
group by p.CID) as hhv where hhv.HOSPCODE=h.hoscode) as visit
from chospital_amp h ORDER BY chronic DESC";



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
    
        public function actionReport2() {//
        

        $sql = "select care_team.hoscode,care_team.hosname,care_team.pop,care_team.doctor,
concat('1 : ',round((care_team.pop/care_team.doctor),0)) as raio from
(select h.hoscode,h.hosname,
(select count(distinct CID) 
from person p 
where p.DISCHARGE='9' 
and p.TYPEAREA in ('1','3')
and p.HOSPCODE=h.hoscode
) as pop,
(select count(distinct CID) as doc
from provider pv
where pv.CID is not null and pv.PROVIDERTYPE in ('03','04','05','06') 
and pv.OUTDATE is null and pv.MOVETO is NULL and pv.HOSPCODE=h.hoscode) as doctor
from chospital_amp h 
) as care_team";



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
       
        return $this->render('report2', [
                   
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    
        ]);
    }
    
    
            public function actionReport3() {//
        

        $sql = "select  h.hoscode,h.hosname,t.`จำนวนหลังคาเรือน`  ,t.`จำนวน อสม.`,t.`จำนวน อสม.ต่อหลังคาเรือน` from chospital_amp h 
LEFT JOIN 
(
select h.hoscode,h.hosname,home2.num_house as 'จำนวนหลังคาเรือน'  ,
home2.num_osm as 'จำนวน อสม.' ,
concat('1 : ',round((home2.num_house/home2.num_osm),0)) as 'จำนวน อสม.ต่อหลังคาเรือน'
from chospital_amp h
join (select home.HOSPCODE,
count(distinct home.HID) as num_house,
count(distinct home.VHVID) as num_osm
from
home
group by home.HOSPCODE) as home2 on home2.HOSPCODE=h.hoscode 
) t on t.hoscode = h.hoscode";



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
       
        return $this->render('report3', [
                   
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    
        ]);
    }
    
    public function  actionReport4(){
        $selyear = date('Y');
        $sql = "select * from rpt_visit_oldman where selyear=$selyear";
        if (!empty($_POST['selyear'])) {
            $selyear = $_POST['selyear'];
             $sql = "select * from rpt_visit_oldman where selyear=$selyear";
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
        $sql ="select count(distinct hhv.CID) as num from 
(SELECT comserv.HOSPCODE,comserv.PID,comserv.SEQ,comserv.DATE_SERV,comserv.COMSERVICE,p.CID
FROM community_service as comserv,person as p
where p.PID=comserv.PID and p.HOSPCODE=comserv.HOSPCODE
and comserv.COMSERVICE like '1A4%' and (TIMESTAMPDIFF(YEAR,p.birth,'2014-09-30')>= 60)
group by p.CID) as hhv where hhv.HOSPCODE=h.hoscode";
        return $this->render('report4', [
                    'dataProvider' => $dataProvider,
                    'sql'=>$sql,
                    'selyear' => $selyear
        ]);
    }
    

}

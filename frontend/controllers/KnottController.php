<?php

namespace frontend\controllers;
use yii;
class KnottController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionPanthai1() {
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        $hospcode='';
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $hospcode=$_POST['hospcode'];
        }
        
        $sql = "select i.diseasethai as diag,count(distinct d.pid) as person,count(DISTINCT d.seq) as visit
from diagnosis_opd d,cdisease i
where d.DIAGCODE=i.diagcode and d.DATE_SERV between '$date1' and '$date2' 
and d.DIAGCODE LIKE 'u%' 
group by d.DIAGCODE
order by visit DESC
limit 10";
        
        if($hospcode !=''){
            $sql = "select i.diseasethai as diag,count(distinct d.pid) as person,count(DISTINCT d.seq) as visit
from diagnosis_opd d,cdisease i
where d.DIAGCODE=i.diagcode and d.DATE_SERV between '$date1' and '$date2' 
and d.DIAGCODE LIKE 'u%' and d.HOSPCODE=$hospcode
group by d.DIAGCODE
order by visit DESC
limit 10";
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
        return $this->render('panthai1', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'date1'=>$date1,
                    'date2'=>$date2,
                    'hospcode'=>$hospcode
        ]);
    }

    public function actionPanthai2() {
       $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        $hospcode='';
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $hospcode=$_POST['hospcode'];
        }
        
        $sql = "select d.PROCEDCODE,i.desc_r as oper,count(distinct d.pid) as person,count(DISTINCT d.seq) as visit
from procedure_opd d,cicd9ttm_planthai i
where d.PROCEDCODE=i.`code` and d.DATE_SERV between '$date1' and '$date2'
group by d.PROCEDCODE
order by visit DESC
limit 10";
        
        if($hospcode !=''){
            $sql = "select d.PROCEDCODE,i.desc_r as oper,count(distinct d.pid) as person,count(DISTINCT d.seq) as visit
from procedure_opd d,cicd9ttm_planthai i
where d.PROCEDCODE=i.`code` and d.DATE_SERV between '$date1' and '$date2'
and d.HOSPCODE=$hospcode 
group by d.PROCEDCODE 
order by visit DESC
limit 10";
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
        return $this->render('panthai2', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'date1'=>$date1,
                    'date2'=>$date2,
                    'hospcode'=>$hospcode
        ]);
    }

    

    public function actionPanthai3() {
        
        $selyear = date('Y');
        
         if (!empty($_POST['selyear'])) {
             $selyear = $_POST['selyear'];
         }
            
         $sql = "select c.hoscode,c.hosname,
max(if(r.month=10,r.price_drug,null)) as m10_price_drug, max(if(r.month=10,r.price_planthai_drug,null)) as m10_panth_drug,
max(if(r.month=11,r.price_drug,null)) as m11_price_drug, max(if(r.month=11,r.price_planthai_drug,null)) as m11_panth_drug,
max(if(r.month=12,r.price_drug,null)) as m12_price_drug, max(if(r.month=12,r.price_planthai_drug,null)) as m12_panth_drug,
max(if(r.month=1,r.price_drug,null)) as m01_price_drug, max(if(r.month=1,r.price_planthai_drug,null)) as m01_panth_drug,
max(if(r.month=2,r.price_drug,null)) as m02_price_drug, max(if(r.month=2,r.price_planthai_drug,null)) as m02_panth_drug,
max(if(r.month=3,r.price_drug,null)) as m03_price_drug, max(if(r.month=3,r.price_planthai_drug,null)) as m03_panth_drug,
max(if(r.month=4,r.price_drug,null)) as m04_price_drug, max(if(r.month=4,r.price_planthai_drug,null)) as m04_panth_drug,
max(if(r.month=5,r.price_drug,null)) as m05_price_drug, max(if(r.month=5,r.price_planthai_drug,null)) as m05_panth_drug,
max(if(r.month=6,r.price_drug,null)) as m06_price_drug, max(if(r.month=6,r.price_planthai_drug,null)) as m06_panth_drug,
max(if(r.month=7,r.price_drug,null)) as m07_price_drug, max(if(r.month=7,r.price_planthai_drug,null)) as m07_panth_drug,
max(if(r.month=8,r.price_drug,null)) as m08_price_drug, max(if(r.month=8,r.price_planthai_drug,null)) as m08_panth_drug,
max(if(r.month=9,r.price_drug,null)) as m09_price_drug, max(if(r.month=9,r.price_planthai_drug,null)) as m09_panth_drug
from chospital_amp c,rpt_panth_drug_value r
where c.hoscode=r.hoscode and r.year_rep=$selyear
group by c.hoscode";
        
       


        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } 
            catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }

        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        
        
        $sql ="SELECT SQL_BIG_RESULT
e.HOSPCODE as hoscode,
$selyear year_rep,
MONTH(e.date_serv) as month,
SUM(IF(LEFT(e.DIDSTD,2) <> '41' OR LEFT(e.DIDSTD,2) <> '42',e.DRUGPRICE*e.AMOUNT,0))  price_drug ,
SUM(IF(d.didstd IS NOT NULL,e.DRUGPRICE*e.AMOUNT,0))  price_planthai_drug
FROM drug_opd e 
LEFT JOIN cdrug_planthai d ON d.didstd=e.DIDSTD 
LEFT JOIN chospital_amp i ON e.HOSPCODE = i.hoscode 
WHERE e.DATE_SERV BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30')   
GROUP BY e.HOSPCODE, LEFT(DATE(e.DATE_SERV),7)";

        return $this->render('panthai3', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'selyear'=>  $selyear
        ]);
    }
    
      public function actionPanthai4() {
          
          
        $selyear = date('Y');
        
         if (!empty($_POST['selyear'])) {
             $selyear = $_POST['selyear'];
         }
        
              $sql = "select
c.hoscode, 
c.hosname,
max(if(r.quarterly=1,r.op_service_pt,null)) as op_visit_pt_q1,
max(if(r.quarterly=1,r.op_service,null)) as op_visit_q1,
max(if(r.quarterly=1,r.tm_service_pt,null)) as tm_visit_pt_q1,
max(if(r.quarterly=1,r.tm_service,null)) as tm_visit_q1,
max(if(r.quarterly=2,r.op_service_pt,null)) as op_visit_pt_q2,
max(if(r.quarterly=2,r.op_service,null)) as op_visit_q2,
max(if(r.quarterly=2,r.tm_service_pt,null)) as tm_visit_pt_q2,
max(if(r.quarterly=2,r.tm_service,null)) as tm_visit_q2,
max(if(r.quarterly=3,r.op_service_pt,null)) as op_visit_pt_q3,
max(if(r.quarterly=3,r.op_service,null)) as op_visit_q3,
max(if(r.quarterly=3,r.tm_service_pt,null)) as tm_visit_pt_q3,
max(if(r.quarterly=3,r.tm_service,null)) as tm_visit_q3,
max(if(r.quarterly=4,r.op_service_pt,null)) as op_visit_pt_q4,
max(if(r.quarterly=4,r.op_service,null)) as op_visit_q4,
max(if(r.quarterly=4,r.tm_service_pt,null)) as tm_visit_pt_q4,
max(if(r.quarterly=4,r.tm_service,null)) as tm_visit_q4
from chospital_amp c,rpt_panth_visit_ratio r
where c.hoscode=r.pcucode and  r.year_rep=$selyear 
group by c.hoscode";
        
       

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } 
            catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }

        $dataProvider = new \yii\data\ArrayDataProvider([
            //'key' => 'hoscode',
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        
        $sql ="SELECT 
$selyear rep_year,
e.code_rep quarterly,
o.hoscode pcucode,
o.hosname,


IFNULL(e.OP_SERVICE_PT,0) op_service_pt,
IFNULL(e.OP_SERVICE,0) op_service,
IFNULL(t.TM_SERVICE_PT,0) tm_service_pt,
IFNULL(t.TM_SERVICE,0) tm_service,
(round((tm_service/op_service)*100,2)) tm_ratio
FROM chospital_amp o 
LEFT JOIN 
(
SELECT SQL_BIG_RESULT 
e.HOSPCODE,
IF(MONTH(e.DATE_SERV) IN (10,11,12),1,
IF(MONTH(e.DATE_SERV) IN (1,2,3),2,
IF(MONTH(e.DATE_SERV) IN (4,5,6),3,4))) code_rep,
COUNT(DISTINCT e.PID) OP_SERVICE_PT, 
COUNT(DISTINCT e.SEQ) OP_SERVICE 
FROM service e 
LEFT JOIN diagnosis_opd d ON d.HOSPCODE = e.HOSPCODE AND d.PID = e.PID AND d.SEQ = e.SEQ AND DATE_FORMAT(d.DATE_SERV,'%Y-%m-%d') BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30') 
WHERE e.DATE_SERV BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30') 
AND LEFT(d.DIAGCODE,1) <> 'Z'
GROUP BY e.HOSPCODE
) e ON e.HOSPCODE = o.hoscode 

LEFT JOIN 
(
SELECT SQL_BIG_RESULT 
e.HOSPCODE,
IF(MONTH(e.DATE_SERV) IN (10,11,12),1,
IF(MONTH(e.DATE_SERV) IN (1,2,3),2,
IF(MONTH(e.DATE_SERV) IN (4,5,6),3,4))) code_rep,
COUNT(DISTINCT e.PID) TM_SERVICE_PT, 
COUNT(DISTINCT e.SEQ) TM_SERVICE 
FROM
(
SELECT e.HOSPCODE, 
e.PID, 
e.SEQ, 
e.DATE_SERV 
FROM diagnosis_opd e 
WHERE e.DATE_SERV BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30') 
AND LEFT(e.DIAGCODE,1) = 'U'

UNION 
SELECT e.HOSPCODE, 
e.PID, 
e.SEQ, 
e.DATE_SERV 
FROM drug_opd e 
WHERE e.DATE_SERV BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30') 
AND LEFT(e.DIDSTD,2) IN ('41','42') 

UNION 
SELECT e.HOSPCODE, 
e.PID, 
e.SEQ, 
e.DATE_SERV 
FROM procedure_opd e 
LEFT JOIN cicd9ttm_planthai p ON e.PROCEDCODE=p.`code` 
WHERE e.DATE_SERV BETWEEN CONCAT(($selyear-1),'-10-01') AND CONCAT($selyear,'-09-30') 
AND p.code IS NOT NULL 

) e
GROUP BY e.HOSPCODE
) t ON t.HOSPCODE = e.HOSPCODE 
WHERE e.HOSPCODE IS NOT NULL";

        return $this->render('panthai4', [
                    'dataProvider' => $dataProvider,
                    'sql'=>$sql,
                    'selyear' => $selyear
        ]);
    }

}

//จบ controller

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

        return $this->render('panthai3', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql,
                    'select_year'=>  isset($_POST['year'])?$_POST['year']:''
        ]);
    }
    
      public function actionPanthai4() {
          
          
        $selyear = date('Y');
        
         if (!empty($_POST['selyear'])) {
             $selyear = $_POST['selyear'];
         }
        
              $sql = "SELECT 
o.hoscode pcucode,
o.hosname,
e.code_rep quarterly,
$selyear+543 year_rep,
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

        return $this->render('panthai4', [
                    'dataProvider' => $dataProvider,
                    'sql'=>$sql,
                    'selyear' => $selyear
        ]);
    }

}

//จบ controller

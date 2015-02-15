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

}

//จบ controller

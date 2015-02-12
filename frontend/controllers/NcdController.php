<?php

namespace frontend\controllers;
use yii;

class NcdController extends \yii\web\Controller {

    public $enableCsrfValidation = false;

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionReport1() {//
        
        $bdg_date = '2014-09-30';
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "select  h.hoscode as hospcode ,h.hosname as hospname,

(SELECT  hos_chronic from 
          (select person.hospcode,count(distinct(person.pid)) as hos_chronic from chronic  
           inner join person on chronic.hospcode = person.hospcode and chronic.pid = person.pid
           where person.discharge = '9' and person.typearea in ('1', '3') and person.nation ='099' and  (chronic.chronic between 'I10' and 'I15')  
           and (TIMESTAMPDIFF(YEAR,person.birth,'$bdg_date') >= 35)  group by person.hospcode) as c
where c.hospcode  = h.hoscode
) as target,IFNULL(l1,0)as l1,IFNULL(l2,0)as l2,IFNULL(l3,0)as l3,IFNULL(l4,0)as l4,IFNULL(l5,0)as l5

from chospital_amp h
LEFT JOIN
(select n.hospcode,sum(if(n.chart = '<10%',1,0)) as l1 ,sum(if(n.chart = '10-<20%',1,0)) as l2 ,
                   sum(if(n.chart = '20-<30%',1,0)) as l3 ,sum(if(n.chart = '30-<40%',1,0)) as l4 ,sum(if(n.chart = '>=40%',1,0)) as l5
                   from sys_ncd_cholesteral_colorchart n
                   where n.date_serv BETWEEN '$date1'  and  '$date2'
                   and  (n.chronic between 'I10' and 'I15') 
                   GROUP BY n.hospcode
) as result  on result.hospcode = h.hoscode
where  hostype  in ('03','04','05','07','08','09','12','13')
order by hoscode asc;";



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
        
        $bdg_date = '2014-09-30';
        $date1 = "2014-10-01";
        $date2 = date('Y-m-d');
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
        }

        $sql = "select  h.hoscode as hospcode ,h.hosname as hospname,


(SELECT  hos_chronic from 
          (select person.hospcode,count(distinct(person.pid)) as hos_chronic from chronic  
           inner join person on chronic.hospcode = person.hospcode and chronic.pid = person.pid         
           where person.discharge = '9' and person.typearea in ('1', '3') and person.nation ='099' and  (chronic.chronic between 'I10' and 'I15')  
           and (TIMESTAMPDIFF(YEAR,person.birth,'$bdg_date') >= 35  )  group by person.hospcode) as c
where c.hospcode  = h.hoscode
) as target,IFNULL(l1,0)as l1,IFNULL(l2,0)as l2,IFNULL(l3,0)as l3,IFNULL(l4,0)as l4,IFNULL(l5,0)as l5


from chospital_amp h
LEFT JOIN
(select n.hospcode,sum(if(n.chart = '<10%',1,0)) as l1 ,sum(if(n.chart = '10-<20%',1,0)) as l2 ,
                   sum(if(n.chart = '20-<30%',1,0)) as l3 ,sum(if(n.chart = '30-<40%',1,0)) as l4 ,sum(if(n.chart = '>=40%',1,0)) as l5
                   from sys_ncd_nocholesteral_colorchart n
                   where n.date_serv BETWEEN '$date1'  and  '$date2'
                   and  (n.chronic between 'I10' and 'I15') 
                   GROUP BY n.hospcode
) as result  on result.hospcode = h.hoscode

where  hostype  in ('03','04','05','07','08','09','12','13')
order by hoscode asc;";



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
                    'date1' => $date1,
                    'date2' => $date2
        ]);
    }

}

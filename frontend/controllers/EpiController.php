<?php

namespace frontend\controllers;
use yii;

class EpiController extends \yii\web\Controller
{
     public $enableCsrfValidation = false;
    public function actionIndex()
    {
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

        $sql = "

select  h.hoscode as hospcode ,h.hosname as hospname,
(SELECT hos_target from
 (select person.hospcode , count(distinct person.pid) as hos_target from person  
           where person.discharge = '9' and person.typearea in ('1', '3') and person.nation ='099' 
           and (person.birth BETWEEN DATE_ADD('$date1',INTERVAL -71 month) and DATE_ADD('$date2',INTERVAL -71 month)) group by person.hospcode ) as t
where  t.hospcode = h.hoscode
) as target ,
(SELECT hos_doit from
          (select person.hospcode,count(distinct(person.pid)) as hos_doit from epi  inner join person on epi.hospcode = person.hospcode and epi.pid = person.pid 
           where person.discharge = '9' and person.typearea in ('1', '3') and person.nation ='099'  
           and (person.birth BETWEEN DATE_ADD('$date1',INTERVAL -71 month) and DATE_ADD('$date2',INTERVAL -71 month))  and epi.VACCINETYPE = '035'  group by person.hospcode) as r
where r.hospcode = h.hoscode
) as result 

from chospital_amp h

order by distcode,hoscode asc;";



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
    }// จบ report1
    
    public function actionReport2() {//
        
        $sql = "SELECT epi.HOSPCODE,h.hosname,
count(distinct case when epi.VACCINETYPE = '901' then epi.pid else null end) as 'ผลงาน(dTc)ทังหมด',
count(distinct case when epi.hospcode=epi.VACCINEPLACE and epi.VACCINETYPE = '901' then epi.pid else null end) as 'ผลงาน(dTc)ของหน่วยบริการ',
count(distinct case when epi.hospcode!=epi.VACCINEPLACE and epi.VACCINETYPE = '901' then epi.pid else null end) as 'ผลงาน(dTc)รับจากที่อื่น',
count(distinct case when epi.VACCINETYPE = '901' and p.typearea in ('1','3') then epi.pid else null end) as 'ผลงานในเขต(dTc)',
count(distinct case when epi.VACCINETYPE = '901' and p.typearea not in ('1','3') then epi.pid else null end) as 'ผลงานนอกเขต(dTc)'
from person p
INNER JOIN epi ON epi.HOSPCODE=p.HOSPCODE and epi.pid=p.pid 
INNER JOIN chospital_amp h ON h.hoscode=p.HOSPCODE
GROUP BY epi.HOSPCODE;";



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
    
    

}

<?php

namespace frontend\controllers;

class PersoncheckController extends \yii\web\Controller {

    public function actionChecktype() {

        $sql = "SELECT * FROM sys_person_type;";


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
        $sql = "select h.hoscode as hospcode ,h.hosname as hospname,type1,type2,type3,type4,total
from chospital_amp h
left join 
   (select person.hospcode  ,count(*) as total,sum(if(person.typearea='1',1,0)) as type1
    ,sum(if(person.typearea='2',1,0)) as type2,sum(if(person.typearea='3',1,0)) as type3
		,sum(if(person.typearea='4',1,0)) as type4
    from person
    where person.discharge = '9'  and person.nation ='099' 
    group by person.hospcode
    order by hospcode) as pa
on h.hoscode = pa.hospcode";
        return $this->render('check_type', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }
    
    public function actionCheckcid() {

        $sql = "select  h.hoscode as hospcode ,h.hosname as hospname,
cid_isnull as CIDเป็นค่าว่าง,cid_not13 as CIDไม่เท่ากับ13หลัก,nation_isnull as สัญชาติไม่ใช่ไทย

from chospital_amp h
LEFT JOIN
          (select person.hospcode,count(distinct(person.pid)) as total,SUM(if(trim(person.cid)='' or ISNULL(person.cid),1,0)) as cid_isnull
          ,SUM(if(length(person.cid) <> 13,1,0)) as cid_not13,SUM(if(trim(person.nation)='' or ISNULL(person.nation),1,0)) as nation_isnull from person  
           where person.discharge = '9' and person.typearea in ('1', '3') and person.nation ='099'   group by person.hospcode) as p
ON h.hoscode = p.hospcode
where hostype  in ('03','04','05','07','08','09','12','13')
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
       
        return $this->render('check_cid', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

    

}

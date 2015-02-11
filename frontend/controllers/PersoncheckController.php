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

}

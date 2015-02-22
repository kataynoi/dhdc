<?php

namespace backend\controllers;

class ExecuteController extends \yii\web\Controller {

    protected function call($store_name, $arg = NULL) {
        $sql = "";
        if ($arg != NULL) {
            $sql = "call " . $store_name . "(" . $arg . ");";
        } else {
            $sql = "call " . $store_name . "();";
        }
        $this->exec_sql($sql);
    }

    protected function exec_sql($sql) {
        $affect_row = \Yii::$app->db->createCommand($sql)->execute();
        return $affect_row;
    }

    protected function query_all($sql) {
        $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        return $rawData;
    }

    protected function run_sys_count_all($ym) {

        $sql = "call cal_sys_count_all($ym)";
        $this->exec_sql($sql);
    }

    public function actionIndex() {
        $sql = "show processlist;";
        $rawData = $this->query_all($sql);

        $dataProvider = new \yii\data\ArrayDataProvider([
            // 'key' => 'hoscode',
            'allModels' => $rawData,
            'sort' => count($rawData) > 0 ? ['attributes' => array_keys($rawData[0])] : [],
            'pagination' => [
                'pageSize' => 15,
            ],
        ]);
        return $this->render('index', [
                    'dataProvider' => $dataProvider,
                    'sql' => $sql
        ]);
    }

    public function actionFilecount() {

        $sql = "truncate sys_count_all";
        $this->exec_sql($sql);

        $month = \backend\models\SysMonth::find()->all();
        foreach ($month as $m) {
            if ($m->month <= date('Ym')) {
                $this->run_sys_count_all($m->month);
            }
        }
    }

    public function actionProcessreport() {
        $running = \backend\models\SysProcessRunning::find()->one();

        if ($running->is_running == 'false') {
            $running->is_running = 'true';
            $running->update();
            //ใส่ excel store;
            
            
            $bdg = '2014-09-30';
            $model = \backend\models\Sysconfigmain::find()->one();
            if($model){
                $bdg=$model->note2;
            }
            $bdg = "'" . $bdg . "'";
            
            
            
            $this->call("cal_chart_dial_1", $bdg);
            $this->call("cal_chart_dial_2", $bdg);
            $this->call("cal_chart_dial_3", $bdg);
            $this->call("cal_chart_dial_4", NULL);
            $this->call("cal_chart_dial_5", NULL);
            $this->call("cal_chart_dial_6", NULL);

            $this->call("cal_ncd_cholesteral_colorchart", $bdg);
            $this->call("cal_ncd_nocholesteral_colorchart", $bdg);


            $this->call("cal_pyramid_level_1", $bdg);
            $this->call("cal_pyramid_level_2");
            $this->call("cal_pyramid_level_3");

            $this->call("cal_sys_person_type");
            
            $y = date('Y');
            $this->call("cal_count_service",$y-1);
            $this->call("cal_count_service",$y);
            
            $this->call("cal_rpt_visit_oldman",$y-1);
            $this->call("cal_rpt_visit_oldman",$y);
            
           //
            

            
            


            //จบใส่ store
            $running->is_running = 'false';
            $running->update();
        }
    }

    public function actionTest() {

        $d = '2014-09-30';
        $d = "'" . $d . "'";
        $sql = " call cal_chart_dial_2($d)";
        $this->exec_sql($sql);
    }

}

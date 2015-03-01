<?php

/*
 * เปลี่ยน  '/n' เป็น /r/n  ใน LOAD DATA
 * เปลี่ยน  $ext == 'txt'  เป็น  strtolower($ext) == 'txt'
 * message  'admin do import all'  เป็น  'import all'
 */

namespace backend\controllers;

use yii;
use yii\helpers\Html;
use backend\models\SysUploadPersonTarget;

class PersonTargetController extends \yii\web\Controller {

    public function actionImport() {


        $full_dir = \Yii::getAlias('@webroot') . "/persontarget";

        $dir = opendir($full_dir);
        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {


                $p = pathinfo($file);
                $ftxt = $p['filename'];
                $ftxt = strtolower($ftxt);
                $ext = $p['extension'];
                if (strtolower($ext) == 'txt') {
                    
                    $info = explode("_", $file);
                    $rep=$info[1];
                    $hos=$info[2];
                    
                    $model = new SysUploadPersonTarget();
                    $model->file_name = $file;


                    $transaction = \Yii::$app->db->beginTransaction();
                    try {

                        $sql = "LOAD DATA LOCAL INFILE '$full_dir/$file'";
                        $sql.= " REPLACE INTO TABLE person_target";
                        $sql.= " FIELDS TERMINATED BY '|'  LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
                        $sql.= " SET rep_year='$rep'";
                        $count = \Yii::$app->db->createCommand($sql)->execute();
                        $transaction->commit();
                        $model->note1 = $hos;
                        $model->upload_date = date('Ymd');
                        $model->upload_time = date('His');
                        $model->save();
                        echo "Import $file Success!\r\n<br>";
                    } catch (Exception $e) {
                        $transaction->rollBack();
                        echo $e->message();
                    }
                }
            }
        }



        closedir($dir);


        $dir = opendir($full_dir);
        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {
                if ($file !== "." && $file !== "..") {
                    unlink("$full_dir/$file");
                }
            }
        }
    }

    public function actionTruncate() {

        if (!\Yii::$app->user->isGuest) {
            $user = Html::encode(Yii::$app->user->identity->username);

            if ($user == 'admin') {

                \Yii::$app->db->createCommand("truncate sys_upload_person_target;")->execute();
                \Yii::$app->db->createCommand("truncate person_target;")->execute();
            }
        }
    }

}

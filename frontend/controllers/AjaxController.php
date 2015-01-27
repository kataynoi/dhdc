<?php

namespace frontend\controllers;

use frontend\models\UploadFortythree;

class AjaxController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionImportfortythree($fortythree, $oldname, $id) {


        $path = './fortythree/';
        $filefortythree = $path . $fortythree;
        $zip = new \ZipArchive();
        if ($zip->open($filefortythree) === TRUE) {
            $zip->extractTo($path);
            $zip->close();
        }
        rename($path . $oldname, $path . $fortythree);


        $dirname = $path . $fortythree;
        $dir = opendir($dirname);

        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {

                $p = pathinfo($file);
                $f = $p['filename'];
                $f = strtolower($f);
                $ext = $p['extension'];
                if ($ext === 'txt') {
                    $sql = "LOAD DATA LOCAL INFILE 'fortythree/$fortythree/$file'";
                    $sql.= " REPLACE INTO TABLE $f";
                    $sql.= " FIELDS TERMINATED BY '|'  LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
                }
                \Yii::$app->db->createCommand($sql)->execute();
            }
        }
        closedir($dir);

        $dir = opendir($dirname);
        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {
                if ($file !== "." && $file !== "..") {
                    unlink("fortythree/$fortythree/$file");
                }
            }
        }
        closedir($dir);

        rmdir("./fortythree/$fortythree");

        $model = UploadFortythree::findOne($id);
        $model->note2 = '1';
        $model->update();
        //print_r($model);
    }

}

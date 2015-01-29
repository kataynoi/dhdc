<?php

namespace frontend\controllers;

use frontend\models\UploadFortythree;

class AjaxController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionImport($fortythree, $oldname, $id) {

        $model = UploadFortythree::findOne($id);
        $model->note2 = 'กำลังนำเข้า';
        $model->update();

       
        $filefortythree = "fortythree/$fortythree";
        $zip = new \ZipArchive();
        if ($zip->open($filefortythree) === TRUE) {
            $zip->extractTo("fortythree");
            $zip->close();
        }
        //rename($path . $oldname, $path . $fortythree);

        $folder_with_ext = explode('.', $fortythree);
        $folder_without_ext = $folder_with_ext[0];

        $full_dir = "fortythree/$folder_without_ext";
        $dir = opendir($full_dir);

        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {
                $model->note3 = $file;
                $model->update();

                $p = pathinfo($file);
                $ftxt = $p['filename'];
                $ftxt = strtolower($ftxt);
                $ext = $p['extension'];
                if ($ext === 'txt') {
                    $sql = "LOAD DATA LOCAL INFILE 'fortythree/$folder_without_ext/$file'";
                    $sql.= " REPLACE INTO TABLE $ftxt";
                    $sql.= " FIELDS TERMINATED BY '|'  LINES TERMINATED BY '\r\n' IGNORE 1 LINES";
                }
                \Yii::$app->db->createCommand($sql)->execute();
            }
        }
        closedir($dir);

        $dir = opendir($full_dir);
        while (($file = readdir($dir)) !== false) {
            if ($file !== "." && $file !== "..") {
                if ($file !== "." && $file !== "..") {
                    unlink("fortythree/$folder_without_ext/$file");
                }
            }
        }

        closedir($dir);

        rmdir("fortythree/$folder_without_ext");
        unlink("fortythree/$fortythree");

        //$model = UploadFortythree::findOne($id);
        $model->note3 = '';
        $model->note2 = 'OK';
        $model->update();
        return $fortythree;
    }

}

<?php

namespace backend\controllers;

/**
 * Description of TestController
 *
 * @author UTEHN
 */
class UpdateController extends \yii\web\Controller {

    public function actionDownloadfile() {
        $source = "http://utehn.plkhealth.go.th/demo/files/f1.txt";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        $data = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);

        $destination = "../views/testssssssss.php";
        $file = fopen($destination, "w+");
        fputs($file, $data);
        fclose($file);
    }

}

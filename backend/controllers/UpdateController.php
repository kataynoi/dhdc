<?php

namespace backend\controllers;
use linslin\yii2\curl;

/**
 * Description of TestController
 *
 * @author UTEHN
 */
class UpdateController extends \yii\web\Controller {

    public function actionDatabase() {       
        
        //Init curl
        $curl = new curl\Curl(); 
        
        $response = $curl->get('http://utehn.plkhealth.go.th/update/sys_version.sql');
        
        print($response);
        \yii::$app->db->createCommand($response)->execute();
       
        
    }
    public function actionProgram(){
        
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

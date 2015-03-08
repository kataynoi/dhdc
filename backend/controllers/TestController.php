<?php

namespace backend\controllers;

use yii;

class TestController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    protected function exec_sql($sql) {
        $db = \Yii::$app->db;

        $affect_row = $db->createCommand($sql)->execute();
        return $affect_row;
    }

    protected function SplitSQL($file, $delimiter = ';') {
        set_time_limit(0);

        if (is_file($file) === true) {
            $file = fopen($file, 'r');

            if (is_resource($file) === true) {
                $query = array();

                while (feof($file) === false) {
                    $query[] = fgets($file);

                    if (preg_match('~' . preg_quote($delimiter, '~') . '\s*$~iS', end($query)) === 1) {
                        $query = trim(implode('', $query));

                        if ($this->exec_sql($query) === false) {
                            echo '<h3>ERROR: ' . $query . '</h3>' . "<br>";
                        } else {
                            echo '<h3>SUCCESS: ' . $query . '</h3>' . "<br>";
                        }

                        while (ob_get_level() > 0) {
                            ob_end_flush();
                        }

                        flush();
                    }

                    if (is_string($query) === true) {
                        $query = array();
                    }
                }

                return fclose($file);
            }
        }

        return false;
    }

    function actionUpdb() {
        $path = yii::getAlias('@databases');
        $file = "$path/test.sql";
        $this->SplitSQL($file);
    }

}

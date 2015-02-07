<?php

namespace backend\controllers;

use Yii;
use backend\models\SysSetTime;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SysSetTimeController implements the CRUD actions for SysSetTime model.
 */
class SyssettimeController extends Controller {
//
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SysSetTime models.
     * @return mixed
     */
    public function create_event() {

        \Yii::$app->db->createCommand("SET GLOBAL event_scheduler = ON;")->execute();
        \Yii::$app->db->createCommand("DROP EVENT IF EXISTS event1;")->execute();


        $t = SysSetTime::find()->one();
        if (count($t) > 0) {
            $date = date('Y-m-d');
            $time = $t->event_time;
            $days = $t->days;

            

            $sql = "CREATE EVENT event1
            ON SCHEDULE EVERY '$days' DAY
            STARTS '$date $time'
            DO
                call all_execute();";

            \Yii::$app->db->createCommand($sql)->execute();
        }
    }

    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => SysSetTime::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SysSetTime model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SysSetTime model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SysSetTime();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->create_event();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SysSetTime model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->create_event();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SysSetTime model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        $this->create_event();
        return $this->redirect(['index']);
    }

    /**
     * Finds the SysSetTime model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SysSetTime the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = SysSetTime::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

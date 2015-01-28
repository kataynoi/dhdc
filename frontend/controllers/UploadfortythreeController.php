<?php

namespace frontend\controllers;

use Yii;
use frontend\models\UploadFortythree;
use frontend\models\UploadFortythreeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UploadFortythreeController implements the CRUD actions for UploadFortythree model.
 */
class UploadfortythreeController extends Controller {

    public function behaviors() {
        
         $role=0;
        if (!Yii::$app->user->isGuest) {
            $role = Yii::$app->user->identity->role;
        }
        $arr = array();
        if ($role == 1) {
            $arr = ['index', 'view', 'create', 'update', 'delete',];
        }
        if ($role == 0) {
            $arr = ['index', 'view'];
        }
        
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new \yii\web\ForbiddenHttpException("ไม่ได้รับอนุญาต");
                },
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => $arr,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => $arr,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UploadFortythree models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UploadFortythreeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UploadFortythree model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UploadFortythree model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        ini_set('max_execution_time', 1800);//ตั้งค่า php.ini
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');

        $model = new UploadFortythree();

        if ($model->load(Yii::$app->request->post())) {

            $upfile = UploadedFile::getInstance($model, 'file');
            if (!$upfile) {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
            $hospcode = explode("_", $upfile->baseName);
            //$model->hospcode='-';
            if(strtoupper($hospcode[1])==='F43'){
                $model->hospcode = $hospcode[2];
            }else{
                $model->hospcode = $hospcode[1];
            }
            $newname = $upfile->baseName . "_" . date('ymdhis') . "." . $upfile->extension;
            $model->file_name = $newname;
            $model->file_size = strval($upfile->size / 1000000);
            $model->note1 = $upfile->baseName;
            $model->note2 = '0';

            $model->save();
            $path = './fortythree/';
            $pathbackup = './fortythreebackup/';
            $upfile->saveAs($path . $newname);
            copy($path . $newname, $pathbackup . $newname);

            return $this->redirect(['view', 'id' => $model->id]);

            //}
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UploadFortythree model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UploadFortythree model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UploadFortythree model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UploadFortythree the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = UploadFortythree::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

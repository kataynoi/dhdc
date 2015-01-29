<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFortythree */

$this->title = Yii::t('app', '{modelClass}', [
            'modelClass' => 'Fortythrees',
        ]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Fortythrees All'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-create">

    <div class="alert alert-block alert-danger">

        <h4>โปรดตรวจสอบคุณภาพข้อมูลก่อนส่ง</h4>
        <h4>ไม่ควรเปลี่ยนชื่อไฟล์ก่อนส่ง</h4>
    </div>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

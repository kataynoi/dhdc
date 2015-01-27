<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UploadFortythree */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Upload Fortythrees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-fortythree-view">



    <p>
        <?= Html::a(Yii::t('app', 'Upload'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'hospcode',
            'file_name',
            'file_size',
            'upload_date',
            'upload_time',
            'note1'
        ],
    ])
    ?>

    <?php
    if($model->note2 !== '1'):?>
    <?php
    echo Html::a(Yii::t('app', 'นำเข้า'), ['ajax/importfortythree',
        'fortythree' => $model->file_name,
        'oldname' => $model->note1, 'id' => $model->id], ['class' => 'btn btn-primary']);
    
    ?>
    <?php else: ?>
    <div class="alert alert-danger">นำเข้าแล้ว..</div>    
    <?php    endif;?>

    
</div>

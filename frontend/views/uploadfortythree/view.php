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
        ],
    ])
    ?>

</div>

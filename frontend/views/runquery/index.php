<?php

use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
?>

<h3>สร้างรายงาน</h3>
<?php
$route = Yii::$app->urlManager->createUrl('runquery/result');
?>
<form method="POST" >
    <div style="margin-bottom: 3px">
        <textarea name="sql_code" id="sql_code" class="form-control" rows='6'><?= @$sql_code ?></textarea>
    </div>
    <div>
        <button class="btn btn-danger"><i class="glyphicon glyphicon-refresh"></i> รันชุดคำสั่ง</button>
         
    </div>
</form>
<hr>
<div style="overflow: auto">
    <?php
    if (isset($dataProvider))
        //echo yii\grid\GridView::widget([
        echo \kartik\grid\GridView::widget([
            'dataProvider' => $dataProvider,
            //'responsive' => FALSE,
            //'hover' => true,
            
            'panel' => [
                'before' => '',
                'type' => \kartik\grid\GridView::TYPE_INFO

            //'after'=>''
            ],
        ]);
    ?>
</div>


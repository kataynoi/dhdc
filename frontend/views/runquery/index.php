<?php

use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
?>

<h3>สร้างรายงาน</h3>
<?php
$route = Yii::$app->urlManager->createUrl('runquery/result');
?>
<form method="POST" >

    <textarea name="sql_code" id="sql_code" class="form-control"><?=@$sql_code?></textarea>

    <button class="btn btn-danger"><i class="glyphicon glyphicon-apple"></i> ทดสอบคำสั่ง</button>
    <button class="btn btn-primary" ><i class="glyphicon glyphicon-check"></i> ตกลง</button>  

</form>
<hr>

<?php
    if(isset($dataProvider))
    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        
        'responsive' => FALSE,
        //'hover' => true,
        'panel' => [
            'before' => '',
        //'after'=>''
        ],
    ]);

?>

<?php
/* @var $this yii\web\View */
?>
<h3>หมวดรายงาน-ประชากร</h3>

<p>
    <?php
    echo \yii\helpers\Html::a('1) จำนวนประชากรแยกกลุ่มอายุ', ['sos/pyramid']);
    
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('2) จำนวนประชากรแยกตามประเภทการอยู่อาศัย', ['personcheck/checktype']);
    
    ?>
</p>

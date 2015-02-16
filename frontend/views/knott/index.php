<?php
/* @var $this yii\web\View */
?>

<h3>หมวดรายงาน-แพทย์แผนไทย</h3>

<p>
    <?php
    echo \yii\helpers\Html::a('1) รายงาน 10 อันดับการให้รหัสโรคแพทย์แผนไทย', ['knott/panthai1']);
    ?>
</p>

<p>
    <?php
    echo \yii\helpers\Html::a('2) รายงาน 10 อันดับการให้รหัสหัตถการแพทย์แผนไทย', ['knott/panthai2']);
    ?>
</p>


<p>
    <?php
    echo \yii\helpers\Html::a('3) รายงานอัตราส่วนการวินิจฉัยรหัสโรคแพทย์แผนไทย', ['knott/panthai3']);
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>

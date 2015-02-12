<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h3>หมวดรายงาน-โรคไม่ติดต่อ</h3>

<p>
    <?php
    echo Html::a('1) color chart ผู้ป่วยความดันโลหิต-HT(ทราบผลคอเลสเตอรอล)', ['ncd/report1']);
    ?>
</p>
<p>
    <?php
    echo Html::a('2) color chart ผู้ป่วยความดันโลหิต-HT(ไม่ทราบผลคอเลสเตอรอล)', ['ncd/report2']);
    ?>
</p>
<p>
    <?php
    echo Html::a('3) color chart ผู้ป่วยเบาหวาน-DM(ทราบผลคอเลสเตอรอล)', ['ncd/report3']);
    ?>
</p>
<p>
    <?php
    echo Html::a('4) color chart ผู้ป่วยเบาหวาน-DM(ไม่ทราบผลคอเลสเตอรอล)', ['ncd/report4']);
    ?>
</p>

<div class="footerrow" style="padding-top: 60px">
    <div class="alert alert-success">
        หมายเหตุ : ระบบรายงานอยู่ระหว่างพัฒนาอย่างต่อเนื่อง
    </div>
</div>

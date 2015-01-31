<?php

use yii\helpers\Html;
use backend\models\Sysconfigmain;

/* @var $this yii\web\View */
$this->title = 'ทีมพัฒนาโปรแกรม';
$this->params['breadcrumbs'][] = $this->title;
$sys=Sysconfigmain::find()->one();
?>
<div class="site-about">
    <h1>ผู้ดูแลระบบ</h1>
    <p>- <?=$sys->note1?></p>
</div>
<div class="site-about">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>- คุณอุเทน จาดยางโทน (สสจ.พิษณุโลก)</p>
    <p>- คุณศรศักดิ์ สีหะวงษ์ (สสจ.พิษณุโลก)</p>
    <p>- คุณสุจินต์ สุกกล้า (รพท.ศรีสังวรณ์ สุโขทัย)</p>
    <p>- คุณสุพัฒนา ปิงเมือง (รพสต.ผักตบ อ.หนองหาน จ.อุดรธานี)</p>
    <p>- คุณสันติ จีนะสอน (สสอ.เมือง จ.เพชรบูรณ์)</p>
    <p>- คุณนครินทร์ เกตุวีระพงศ์ (รพ.วัดโบสถ์ จ.พิษณุโลก)</p>
</div>

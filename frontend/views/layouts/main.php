<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>

        <?php $this->beginBody() ?>
        <div class="wrap">

            <?php
            NavBar::begin([
                'brandLabel' => '<span class="glyphicon glyphicon-th-large"></span>',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-custom navbar-fixed-top',
                ],
            ]);

            if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => 'สมัครผู้ใช้', 'url' => ['/site/signup']];
                $submenuItems[] = ['label' => 'เข้าระบบ', 'url' => ['/site/login']];
            } else {
                
                $submenuItems[] = ['label' => 'ตั้งค่า', 'url' => ['/user/index']];
                
                $submenuItems[] = [
                    'label' => 'ออกจากระบบ',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> ประชากร', 'url' => ['#']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> โรคติดต่อ', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> โรคไม่ติดต่อ', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> แม่และเด็ก', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> ภูมิคุ้มกันโรค', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> แพทย์แผนไทยและแพทย์ทางเลือก', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> สุขภาพจิต', 'url' => ['site/about']];
            $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-file"></span> ยาและเวชภัณฑ์', 'url' => ['site/about']];
            if (!Yii::$app->user->isGuest) {
                $report_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-refresh"></span> คำสั่ง sql', 'url' => ['runquery/index']];
            }
            $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = '(' . Html::encode(Yii::$app->user->identity->username) . ')';
            }

            $menuItems = [
                ['label' =>
                    '<span class="glyphicon glyphicon-folder-open"></span> ปริมาณข้อมูล',
                    'url' => ['summay/sum1']
                ],
                ['label' =>
                    '<span class="glyphicon glyphicon-list-alt"></span> กลุ่มรายงานมาตรฐาน',
                    'items' => $report_mnu_itms
                ],
                ['label' => '<span class="glyphicon glyphicon-floppy-open"></span> นำเข้าข้อมูล', 'url' => ['/uploadfortythree/index']],
                ['label' => '<span class="glyphicon glyphicon-user"></span> ผู้ใช้งาน ' . $username,
                    'items' => $submenuItems
                ]
            ];
           
           
            $config_main=  backend\models\Sysconfigmain::find()->one();
            
           
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-left'],
                'encodeLabels' => false,
                'items' => [['label' => 'DHDC : ศูนย์ข้อมูล43แฟ้ม อ.' . Html::encode($config_main->district_name)]],
            ]);

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?=$config_main->district_name?> <?= date('Y') ?></p>
                <p class="pull-right"><?=  Html::a('DHDC TEAM', ['site/index'])?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

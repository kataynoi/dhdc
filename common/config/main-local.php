<?php

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=192.168.1.24;dbname=dhdc;port=3306',
            'username' => 'sa',
            'password' => 'sa',
            'charset' => 'utf8',
            'attributes' => array(
                PDO::MYSQL_ATTR_LOCAL_INFILE => true
            ),
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];

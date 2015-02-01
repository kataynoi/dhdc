<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sys_version".
 *
 * @property integer $id
 * @property string $frontend
 * @property string $backend
 * @property string $database
 * @property string $note1
 * @property string $note2
 * @property string $note3
 * @property string $note4
 * @property string $note5
 */
class SysVersion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_version';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frontend', 'backend', 'database', 'note1', 'note2', 'note3', 'note4', 'note5'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'frontend' => 'Frontend',
            'backend' => 'Backend',
            'database' => 'Database',
            'note1' => 'Note1',
            'note2' => 'Note2',
            'note3' => 'Note3',
            'note4' => 'Note4',
            'note5' => 'Note5',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property string $HOSPCODE
 * @property string $CID
 * @property string $PID
 * @property string $HID
 * @property string $PRENAME
 * @property string $NAME
 * @property string $LNAME
 * @property string $HN
 * @property string $SEX
 * @property string $BIRTH
 * @property string $MSTATUS
 * @property string $OCCUPATION_OLD
 * @property string $OCCUPATION_NEW
 * @property string $RACE
 * @property string $NATION
 * @property string $RELIGION
 * @property string $EDUCATION
 * @property string $FSTATUS
 * @property string $FATHER
 * @property string $MOTHER
 * @property string $COUPLE
 * @property string $VSTATUS
 * @property string $MOVEIN
 * @property string $DISCHARGE
 * @property string $DDISCHARGE
 * @property string $ABOGROUP
 * @property string $RHGROUP
 * @property string $LABOR
 * @property string $PASSPORT
 * @property string $TYPEAREA
 * @property string $D_UPDATE
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HOSPCODE', 'PID', 'PRENAME', 'NAME', 'LNAME', 'SEX', 'BIRTH', 'NATION', 'TYPEAREA', 'D_UPDATE'], 'required'],
            [['BIRTH', 'MOVEIN', 'DDISCHARGE', 'D_UPDATE'], 'safe'],
            [['HOSPCODE'], 'string', 'max' => 5],
            [['CID', 'FATHER', 'MOTHER', 'COUPLE'], 'string', 'max' => 13],
            [['PID', 'HN'], 'string', 'max' => 15],
            [['HID'], 'string', 'max' => 14],
            [['PRENAME', 'OCCUPATION_OLD', 'RACE', 'NATION'], 'string', 'max' => 3],
            [['NAME', 'LNAME'], 'string', 'max' => 50],
            [['SEX', 'MSTATUS', 'FSTATUS', 'VSTATUS', 'DISCHARGE', 'ABOGROUP', 'RHGROUP', 'TYPEAREA'], 'string', 'max' => 1],
            [['OCCUPATION_NEW'], 'string', 'max' => 4],
            [['RELIGION', 'EDUCATION', 'LABOR'], 'string', 'max' => 2],
            [['PASSPORT'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'HOSPCODE' => Yii::t('app', 'Hospcode'),
            'CID' => Yii::t('app', 'Cid'),
            'PID' => Yii::t('app', 'Pid'),
            'HID' => Yii::t('app', 'Hid'),
            'PRENAME' => Yii::t('app', 'Prename'),
            'NAME' => Yii::t('app', 'Name'),
            'LNAME' => Yii::t('app', 'Lname'),
            'HN' => Yii::t('app', 'Hn'),
            'SEX' => Yii::t('app', 'Sex'),
            'BIRTH' => Yii::t('app', 'Birth'),
            'MSTATUS' => Yii::t('app', 'Mstatus'),
            'OCCUPATION_OLD' => Yii::t('app', 'Occupation  Old'),
            'OCCUPATION_NEW' => Yii::t('app', 'Occupation  New'),
            'RACE' => Yii::t('app', 'Race'),
            'NATION' => Yii::t('app', 'Nation'),
            'RELIGION' => Yii::t('app', 'Religion'),
            'EDUCATION' => Yii::t('app', 'Education'),
            'FSTATUS' => Yii::t('app', 'Fstatus'),
            'FATHER' => Yii::t('app', 'Father'),
            'MOTHER' => Yii::t('app', 'Mother'),
            'COUPLE' => Yii::t('app', 'Couple'),
            'VSTATUS' => Yii::t('app', 'Vstatus'),
            'MOVEIN' => Yii::t('app', 'Movein'),
            'DISCHARGE' => Yii::t('app', 'Discharge'),
            'DDISCHARGE' => Yii::t('app', 'Ddischarge'),
            'ABOGROUP' => Yii::t('app', 'Abogroup'),
            'RHGROUP' => Yii::t('app', 'Rhgroup'),
            'LABOR' => Yii::t('app', 'Labor'),
            'PASSPORT' => Yii::t('app', 'Passport'),
            'TYPEAREA' => Yii::t('app', 'Typearea'),
            'D_UPDATE' => Yii::t('app', 'D  Update'),
        ];
    }
}

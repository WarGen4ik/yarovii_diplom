<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "statement".
 *
 * @property int $id
 * @property int $worker_id
 * @property string $fio
 * @property string $phone
 * @property string $status
 * @property string $cityFrom
 * @property string $cityTo
 * @property float $weight
 * @property float $volume
 * @property int $created_by
 * @property int $updated_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Workers $worker
 */
class Statement extends \yii\db\ActiveRecord
{
    const STATUS_NEW='new';
    const STATUS_ACTIVE='active';
    const STATUS_FINISHED='finished';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statement';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            BlameableBehavior::className(),
        ];
    }

    public static function getStatusNames(){
        return [
            self::STATUS_NEW => 'Новий',
            self::STATUS_ACTIVE => 'Активний',
            self::STATUS_FINISHED => 'Завершений',
        ];
    }

    public static function getStatusName($status){
        return self::getStatusNames()[$status];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['worker_id', 'created_by', 'updated_by'], 'integer'],
            [['fio', 'phone', 'status', 'cityFrom', 'cityTo', 'weight', 'volume'], 'required'],
            [['weight', 'volume'], 'number'],
            ['status', 'default', 'value' => self::STATUS_NEW],
            [['created_at', 'updated_at'], 'safe'],
            [['fio', 'phone', 'status', 'cityFrom', 'cityTo'], 'string', 'max' => 100],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['worker_id'], 'exist', 'skipOnError' => true, 'targetClass' => Workers::className(), 'targetAttribute' => ['worker_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worker_id' => 'Водій',
            'fio' => 'ПІБ',
            'phone' => 'Телефон',
            'status' => 'Статус',
            'cityFrom' => 'Місто відправлення',
            'cityTo' => 'Місто доставки',
            'weight' => 'Вага',
            'volume' => 'Об\'єм',
            'created_by' => 'Ким створена',
            'updated_by' => 'Ким оновлена',
            'created_at' => 'Коли створена',
            'updated_at' => 'Коли оновлена',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorker()
    {
        return $this->hasOne(Workers::className(), ['id' => 'worker_id']);
    }
}

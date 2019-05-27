<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "workers".
 *
 * @property int $id
 * @property string $fio
 * @property string $city
 * @property string $phone
 * @property int $car_type_id
 * @property int $created_by
 * @property string $created_at
 *
 * @property Statement[] $statements
 * @property CarTypes $carType
 * @property User $createdBy
 */
class Workers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'city', 'phone', 'car_type_id'], 'required'],
            [['car_type_id', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['fio', 'city'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
            [['car_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CarTypes::className(), 'targetAttribute' => ['car_type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'city' => 'City',
            'phone' => 'Phone',
            'car_type_id' => 'Car Type ID',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatements()
    {
        return $this->hasMany(Statement::className(), ['worker_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarType()
    {
        return $this->hasOne(CarTypes::className(), ['id' => 'car_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}

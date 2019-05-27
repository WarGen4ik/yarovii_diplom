<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_types".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property double $maxVolume
 * @property double $maxWeight
 *
 * @property Workers[] $workers
 */
class CarTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'maxVolume', 'maxWeight'], 'required'],
            [['maxVolume', 'maxWeight'], 'number'],
            [['slug', 'name'], 'string', 'max' => 100],
            [['slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'maxVolume' => 'Max Volume',
            'maxWeight' => 'Max Weight',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkers()
    {
        return $this->hasMany(Workers::className(), ['car_type_id' => 'id']);
    }
}

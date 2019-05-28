<?php


namespace frontend\models;


use common\models\Statement;
use yii\base\Model;

class StatementForm extends Model
{
    public $fio;
    public $phone;
    public $cityFrom;
    public $cityTo;
    public $weight;
    public $volume;

    public function rules()
    {
        return [
            [['fio', 'phone', 'cityFrom', 'cityTo', 'weight', 'volume'], 'required'],
            [['weight', 'volume'], 'number'],
            [['fio', 'phone', 'cityFrom', 'cityTo'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fio' => 'ПІБ',
            'phone' => 'Номер телефону',
            'cityFrom' => 'Місто відправлення',
            'cityTo' => 'Місто доставки',
            'weight' => 'Вага (кг)',
            'volume' => 'Об\'єм (м3)',
        ];
    }

    public function create(){
        $statement = new Statement();

        $statement->setAttributes($this->getAttributes());
        $statement->status = Statement::STATUS_NEW;
        if ($statement->save())
            return $statement;
        return false;
    }
}

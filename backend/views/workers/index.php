<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\WorkersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Водії';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="workers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати водія', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fio',
            'city',
            'phone',
            [
                'attribute' => 'car_type_id',
                'value' => function (\common\models\Workers $model) {
                    return $model->carType->name;
                }
            ],
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy->email;
                }
            ],
            'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

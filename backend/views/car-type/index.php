<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типи машин';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-types-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Створити тип', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'slug',
            'name',
            'maxVolume',
            'maxWeight',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

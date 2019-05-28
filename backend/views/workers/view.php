<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Workers */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Водії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="workers-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
        ],
    ]) ?>

</div>

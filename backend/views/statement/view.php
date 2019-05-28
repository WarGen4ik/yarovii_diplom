<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Statement */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="statement-view">

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
            [
                'attribute' => 'worker_id',
                'value' => function (\common\models\Statement $model) {
                    if ($model->worker) {
                        return Html::a($model->worker->fio, '/workers/view/' . $model->worker_id);
                    }
                    return 'N\A';
                },
                'format' => 'raw',
            ],
            'fio',
            'phone',
            [
                'attribute' => 'status',
                'filter' => \common\models\Statement::getStatusNames(),
                'value' => function (\common\models\Statement $model) {
                    return \common\models\Statement::getStatusName($model->status);
                }
            ],
            'cityFrom',
            'cityTo',
            'volume',
            'weight',
            [
                'attribute' => 'created_by',
                'value' => function ($model) {
                    return $model->createdBy->email;
                }
            ],
            [
                'attribute' => 'updated_by',
                'value' => function ($model) {
                    return $model->updatedBy->email;
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

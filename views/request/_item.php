<?php

use app\models\Request;
use yii\helpers\Html;
/** @var Request $model */
?>
<?php
 $classCard = match ($model->status->code) {
     'new' => 'border-danger bg-danger-card',
     'in_progress' => 'border-primary',
     'done' => 'border-success bg-success-card',
 }
?>
<div class="card mb-2 <?= $classCard ?>">
    <div class="card-body ">
        <h5 class="card-title"><?= Html::encode($model->course->name) ?></h5>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $model->started_at ?></h6>
        <h6 class="card-subtitle mb-2 text-body-secondary"><?= $model->status->name ?></h6>
        <p class="card-text">Email: <?= $model->user->email ?></p>
        <p class="card-text">Метод оплаты: <?= $model->paymentMethod->name ?></p>
    </div>
</div>
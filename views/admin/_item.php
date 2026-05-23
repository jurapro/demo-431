<?php
/** @var \app\models\Request $model */
    $classStatus = match ($model->status->code) {
        'new' => 'border-danger',
        'in_progress' => 'border-primary',
        'done' => 'border-info',
    }
?>

<div class="card text-center mb-2 <?= $classStatus ?>">
    <div class="card-header">
        <?php
        echo $model->course->name;
        ?>
    </div>
    <div class="card-body">
        <h5 class="card-title"><?= $model->started_at ?></h5>
        <p class="card-text"><?= $model->user->email ?></p>
        <p class="card-text"><?= $model->paymentMethod->name ?></p>
        <?php
        if ($model->status->code === 'new' || $model->status->code === 'in_progress') {
            echo \yii\helpers\Html::a('Изменить статус', ['/request/update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }

        ?>
    </div>
    <div class="card-footer text-body-secondary">
        <?= $model->status->name ?>
    </div>
</div>
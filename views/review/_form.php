<?php

use app\models\Request;
use app\models\Status;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Review $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $requests = Request::find()
        ->where(['status_id' => Status::find()->where(['code' => 'done'])->one()->id])
        ->where(['user_id' => Yii::$app->user->id])
        ->all();

    $items = [];

    foreach ($requests as $request) {
        $items[$request->id] = $request->started_at." - ".$request->course->name;
    }
    ?>

    <?= $form->field($model, 'request_id')->dropdownList($items, ['prompt'=>'Выберите заявку']); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

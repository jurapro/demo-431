<?php

use app\models\Course;
use app\models\PaymentMethod;
use app\models\Status;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;


/** @var yii\web\View $this */
/** @var app\models\Request $model */
/** @var yii\bootstrap5\ActiveForm $form */
?>

<div class="request-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $courses = Course::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();

    $paymentMethods = PaymentMethod::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();

    $statuses = Status::find()
        ->select(['name'])
        ->indexBy('id')
        ->column();
    ?>

    <?= $form->field($model, 'course_id')->dropdownList($courses, ['prompt'=>'Выберите курс', 'disabled' => true]); ?>

    <?= $form->field($model, 'started_at')->input('date', ['disabled' => true]) ?>

    <?= $form->field($model, 'payment_method_id')->dropdownList($paymentMethods, ['prompt'=>'Выберите способ оплаты', 'disabled' => true]) ?>

    <?= $form->field($model, 'status_id')->dropdownList($statuses) ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

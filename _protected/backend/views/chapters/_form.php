<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Chapters */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'country_id')->dropDownList(
        $model->countries,
        [
            'prompt'=>'- Select Country -',
            'class'=>'form-control select2',
            'id'=>'country',
            'onchange'=> '$.post( "'.Yii::$app->urlManager->createUrl('countries/active-states?id=').'"+$(this).val(), function( data ) {
                                  $( "select#state" ).html( data );
                                });'

        ]
    )
    ?>
    <?= $form->field($model, 'state_id')->dropDownList(
        ($model->isNewRecord ? array():$states),
        [
            'prompt'=>'- Select State -',
            'class'=>'form-control select2',
            'id'=>'state',
        ]
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

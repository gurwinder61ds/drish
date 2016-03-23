<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SettingAttributesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Attributes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-attributes-index">
<?php if(isset($attribute) && !empty($attribute)){ ?>
							   <?= Html::a('Add Setting Attribute', ['create', 'setting_id' => $attribute->setting_id], ['class' => 'btn btn-success']) ?>
						<?php

						$attribute_id = $attribute->id;
						}
						else{ ?>
							   <?= Html::a('Add Setting Attribute', ['create'], ['class' => 'btn btn-success']) ?>
					<?php $attribute_id = 0;	} ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'setting_id',
            'name',
            'input_type',

           ['class' => 'yii\grid\ActionColumn','header'=>'Actions',
							'buttons' => [
							'update' =>function ($url, $model, $key) {
							$options = array_merge([
							'title' => Yii::t('yii', 'Update Attribute'),
							'aria-label' => Yii::t('yii', 'Update Attribute'),
							'data-pjax' => '0',
							], []);
							return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['setting-attributes/update','id'=> $model->id , 'setting_id'=> $model->setting_id], $options);
							},
							],
							'template' => '{update}{delete}', 'contentOptions' => ['style' => 'width:160px;letter-spacing:10px;text-align:center'],
							],
        ],
    ]); ?>

</div>

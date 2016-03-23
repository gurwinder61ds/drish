<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
/* @var $role common\rbac\models\Role */

$this->title = Yii::t('app', 'Create New Ambassador Account');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <div class="col-lg-5 well bs-component">
                        <?= $this->render('_form-ambassador', [
                            'user' => $user,
                            'role' => $role,
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
namespace ambassador\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;


class BackendController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['site'],
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'controllers' => ['site'],
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['admin','theCreator'],
                    ],
                    [
                        'controllers' => ['user'],
                        'actions' => ['index', 'view', 'create', 'create-ambassador', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['admin','theCreator'],
                    ],
                    [
                        'controllers' => ['setting-attributes'],
                        'actions' => ['index', 'globalsetting'],
                        'allow' => true,
                        'roles' => ['admin','theCreator'],
                    ],
                    [
                        'controllers' => ['chapters'],
                        'actions' => ['index', 'create'],
                        'allow' => true,
                        'roles' => ['admin','theCreator'],
                    ],
					
                    [
                        // other rules
                    ],

                ], // rules
                'denyCallback' => function ($rule, $action) {
                    if(Yii::$app->user->isGuest){
                        return $this->redirect(['site/login']);
                    }else{
                        return $this->redirect(Yii::$app->params['baseurl']);
                    }
                },

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

} // BackendController
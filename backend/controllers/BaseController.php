<?php


namespace backend\controllers;


use yii\web\Controller;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $user = \Yii::$app->user->getIdentity();

        if (\Yii::$app->user->isGuest || !$user->is_manager){
            return $this->redirect('/site/login');
        }
        return parent::beforeAction($action);
    }
}

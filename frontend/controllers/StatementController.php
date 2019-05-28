<?php


namespace frontend\controllers;


use frontend\models\StatementForm;
use yii\web\Controller;

class StatementController extends Controller
{
    public function actionCreate(){
        $form = new StatementForm();

        if ($form->load(\Yii::$app->request->post()) && ($model = $form->create()) != false){
            return $this->redirect('/thankyou');
        }

        return $this->render('create', [
            'model' => $form,
        ]);
    }

    public function actionThankyou(){
        return $this->render('thankyou');
    }
}

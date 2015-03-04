<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\helpers\VarDumper;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','test','error', 'boroda'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionError(){
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            return '';
        }
        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: Yii::t('yii', 'Error');
        }
        if ($code) {
            $name .= " (#$code)";
        }
        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage ?: Yii::t('yii', 'An internal server error occurred.');
        }
        if (Yii::$app->getRequest()->getIsAjax()) {
            return "$name: $message";
        } else {
            return $this->controller->render('error', [
                'name' => $name,
                'message' => $message,
                'exception' => $exception,
            ]);
        }
    }

    public function actionTest(){

        $p = (Yii::getAlias('@app/web/dsfsdf'));
        $answer = [];
        $handle = @fopen($p, "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $a = explode(chr(9),$buffer);
                $answer[] = '['.$a[0].','.$a[1].','.$a[2].','.$a[3].','.$a[4].','.$a[5].','.$a[6].','.$a[7].']';
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }

        echo implode(', ',$answer);
    }

    public function actionBoroda()
    {
        $path = Yii::getAlias('@app/web/dsfsdf');
        $f = fopen($path, 'r');

        $result = [];
        if($f) {
            while(($buffer = fgets($f, 4096)) !== false) {
                $a = explode(chr(9),$buffer);
                array_walk($a, function(&$v, &$k) { $v = str_replace(',', '.', $v); });
                $result[] = "'$a[0]' => [$a[1], $a[2], $a[3], $a[4], $a[5], $a[6]]";
            }
        } else {
            echo 'ERROR: cannot open file';
        }
        echo implode(',<br>', $result);
    }

}

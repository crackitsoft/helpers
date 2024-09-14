<?php

namespace crackitsoft\helpers;

use Yii;

class ApiModule extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        foreach ($this->apiConfigs() as $key => $values) {
            Yii::$app->set($key, $values);
        }
    }
    public function apiConfigs()
    {
        return [
            "user" => [
                'class' => 'yii\web\User',
                'identityClass' => 'iam\models\User',
                'enableAutoLogin' => false,
                'enableSession' => false,
            ],
            'errorHandler' => [
                'class' => 'helpers\ErrorHandler',
            ],
            'request' => [
                'class' => 'yii\web\Request',
                'enableCsrfValidation' => false,
                'enableCsrfCookie' => false,
                'enableCookieValidation' => false,
                'parsers' => [
                    'application/json' => 'yii\web\JsonParser',
                ],
            ],
            'response' => [
                /* Enable JSON Output: */
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'charset' => 'UTF-8',
                'on beforeSend' => function ($event) {
                    $response = $event->sender;
                    if ($response->data !== null && is_array($response->data)) {
                        /* delete code param */
                        if (array_key_exists('code', $response->data)) {
                            unset($response->data['code']);
                        }
                        /* change status to statusCode */
                        if (array_key_exists('status', $response->data)) {
                            $response->data['statusCode'] = $response->data['status'];
                            unset($response->data['status']);
                        }
                    }
                },
            ],
        ];
    }
}

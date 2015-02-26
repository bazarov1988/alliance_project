<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 22.01.15
 * Time: 15:21
 */

namespace app\assets;
use yii\web\AssetBundle;

class AllianceAsset extends AssetBundle {
    public $sourcePath = '@app/themes/alliance/assets';
    public $css = [
        'bower_components/metisMenu/dist/metisMenu.css',
        'dist/css/sb-admin-2.css',
        'dist/css/timeline.css',
        'dist/css/main.css',
        'bower_components/font-awesome/css/font-awesome.min.css'
    ];
    public $js = [
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'dist/js/sb-admin-2.js',
        'bower_components/metisMenu/dist/metisMenu.js',
    ];
} 
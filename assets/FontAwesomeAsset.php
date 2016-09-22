<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 15:24
 */
namespace veksharelinks\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/font-awesome';
    public $css = [
        'css/font-awesome.min.css'
    ];
}

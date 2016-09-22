<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 15:24
 */

namespace veksharelinks\assets;

use yii\web\AssetBundle;

class BootstrapSocialAsset extends AssetBundle
{
    public $sourcePath = '@vendor/bower/bootstrap-social';
    public $css = [
        'bootstrap-social.css'
    ];
}

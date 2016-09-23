<?php

namespace veksharelinks\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SocialAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => true,
        'linkAssets' => true,
    ];
    public $sourcePath = '@veksharelinks';
    public $js = [
        'js/social.js'
    ];
    public $depends = [
        'veksharelinks\assets\FontAwesomeAsset',
        'veksharelinks\assets\BootstrapSocialAsset',
        'yii\web\JqueryAsset',
    ];
}

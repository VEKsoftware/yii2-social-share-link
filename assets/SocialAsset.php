<?php

namespace veksharelinks\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class SocialAsset extends AssetBundle
{
    public $depends = [
        'vek\assets\FontAwesomeAsset',
        'vek\assets\BootstrapSocialAsset',
        'ijackua\sharelinks\ShareLinksAssets'
    ];
}

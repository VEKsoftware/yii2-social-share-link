<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 15:59
 */

namespace veksharelinks;

use veksharelinks\assets\SocialAsset;
use Yii;

class ShareLinksWidget extends \ijackua\sharelinks\ShareLinks
{
    /**
     * {@inherit}
     *
     * @var string
     */
    public $viewName = 'panel';

    /**
     * {@inherit}
     *
     * @return void
     */
    public function init()
    {
        $this->url = (empty($this->url)) ? Yii::$app->getRequest()->getAbsoluteUrl() : $this->url;
        SocialAsset::register($this->view);
    }
}

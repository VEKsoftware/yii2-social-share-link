<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 16:33
 */

use veksharelinks\ShareLinksWidget;
use yii\helpers\Html;

?>

<div class="socialShareBlock">
    <div class="btn btn-social-icon btn-facebook">
        <?php
        echo Html::tag(
            'i',
            '',
            [
                'data-href' => $this->context->shareUrl(ShareLinksWidget::SOCIAL_FACEBOOK),
                'class' => 'fa fa-facebook'
            ]
        ) ?>
    </div>

    <div class="btn btn-social-icon btn-twitter">
        <?php
        echo Html::tag(
            'i',
            '',
            [
                'data-href' => $this->context->shareUrl(ShareLinksWidget::SOCIAL_TWITTER),
                'class' => 'fa fa-twitter'
            ]
        ) ?>
    </div>

    <div class="btn btn-social-icon btn-linkedin">
        <?php
        echo Html::tag(
            'i',
            '',
            [
                'data-href' => $this->context->shareUrl(ShareLinksWidget::SOCIAL_LINKEDIN),
                'class' => 'fa fa-linkedin'
            ]
        ) ?>
    </div>

    <div class="btn btn-social-icon btn-google">
        <?php
        echo Html::tag(
            'i',
            '',
            [
                'data-href' => $this->context->shareUrl(ShareLinksWidget::SOCIAL_GPLUS),
                'class' => 'fa fa-google'
            ]
        ) ?>
    </div>

    <div class="btn btn-social-icon btn-vk">
        <?php
        echo Html::tag(
            'i',
            '',
            [
                'data-href' => $this->context->shareUrl(ShareLinksWidget::SOCIAL_VKONTAKTE),
                'class' => 'fa fa-vk'
            ]
        ) ?>
    </div>
</div>

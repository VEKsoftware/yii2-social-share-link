<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 16:33
 */
use veksharelinks\ShareLinks;
use yii\helpers\Html;

?>

<div class="socialShareBlock">
    <div class="btn btn-social-icon btn-facebook">
    <?php
    echo Html::a(
        '<i class="fa fa-facebook"></i>',
        $this->context->shareUrl(ShareLinks::SOCIAL_FACEBOOK),
        ['title' => 'Share to Facebook']
    ) ?>
    </div>

    <div class="btn btn-social-icon btn-twitter">
    <?php
    echo Html::a(
        '<i class="fa fa-twitter"></i>',
        $this->context->shareUrl(ShareLinks::SOCIAL_TWITTER),
        ['title' => 'Share to Twitter']
    ) ?>
    </div>

    <div class="btn btn-social-icon btn-linkedin">
    <?php
    echo Html::a(
        '<i class="fa fa-linkedin"></i>',
        $this->context->shareUrl(ShareLinks::SOCIAL_LINKEDIN),
        ['title' => 'Share to LinkedIn']
    ) ?>
    </div>

    <div class="btn btn-social-icon btn-google">
    <?php
    echo Html::a(
        '<i class="fa fa-google"></i>',
        $this->context->shareUrl(ShareLinks::SOCIAL_GPLUS),
        ['title' => 'Share to Google Plus']
    ) ?>
    </div>

    <div class="btn btn-social-icon btn-vk">
    <?php
    echo Html::a(
        '<i class="fa fa-vk"></i>',
        $this->context->shareUrl(ShareLinks::SOCIAL_VKONTAKTE),
        ['title' => 'Share to Vkontakte']
    ) ?>
    </div>
</div>

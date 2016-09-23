<?php
/**
 * Created by PhpStorm.
 * User: dolgikh
 * Date: 22.09.16
 * Time: 16:33
 *
 * @var array $buttons
 */

use yii\helpers\Html;

?>

<div class="socialShareBlock">
    <?php foreach ($buttons as $button): ?>
    <div class="<?php echo Html::encode($button['buttonClasses']) ?>">
        <i class="<?php echo Html::encode($button['iconClasses']) ?>" data-social="<?php echo Html::encode($button['sharedLink']) ?>"></i>
    </div>
    <?php endforeach; ?>
</div>

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
use yii\base\ErrorException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
 * Class ShareLinksWidget
 *
 * Виджет для шаринга страницы с соц сетях
 *
 * @package Veksharelinks
 */
class ShareLinksWidget extends Widget
{
    /**
     * Констранты соц сетей
     */
    const VKONTAKTE = 'vkontakte';
    const FACEBOOK = 'facebook';
    const TWITTER = 'twitter';
    const GPLUS = 'gp';
    const LINKEDIN = 'linkedin';

    /**
     * Размеры кнопок
     */
    const BUTTON_SIZE_LG = 'lg';
    const BUTTON_SIZE_MD = 'md';
    const BUTTON_SIZE_SM = 'sm';
    const BUTTON_SIZE_XS = 'xs';

    /**
     * Ссылки соц сетей на шаринг
     */
    const SOCIAL_NETWORKS_SHARED_LINKS = [
        self::TWITTER => 'https://twitter.com/intent/tweet?url=',
        self::FACEBOOK => 'https://www.facebook.com/sharer/sharer.php?u=',
        self::VKONTAKTE => 'http://vk.com/share.php?url=',
        self::GPLUS => 'https://plus.google.com/share?url=',
        self::LINKEDIN => 'http://www.linkedin.com/shareArticle?url=',
    ];

    /**
     * Иконки соц сетей
     */
    const SOCIAL_NETWORKS_ICONS = [
        self::TWITTER => 'fa-twitter',
        self::FACEBOOK => 'fa-facebook',
        self::VKONTAKTE => 'fa-vk',
        self::GPLUS => 'fa-google',
        self::LINKEDIN => 'fa-linkedin',
    ];

    /**
     * Кнопки социальных сетей
     */
    const SOCIAL_NETWORKS_BUTTONS = [
        self::TWITTER => 'btn-twitter',
        self::FACEBOOK => 'btn-facebook',
        self::VKONTAKTE => 'btn-vk',
        self::GPLUS => 'btn-google',
        self::LINKEDIN => 'btn-linkedin',
    ];

    /**
     * Размеры кнопок соц сетей
     */
    const SOCIAL_NETWORKS_BUTTONS_SIZE = [
        self::BUTTON_SIZE_LG => 'btn-lg',
        self::BUTTON_SIZE_MD => 'btn-md',
        self::BUTTON_SIZE_SM => 'btn-sm',
        self::BUTTON_SIZE_XS => 'btn-xs'
    ];

    /**
     * Массив, содержащий кнопки соц сетей
     *
     * @var array
     */
    public $buttons = [];

    /**
     * Мета-тэги для страницы, на которой отображается виджет.
     * П.С мета-тэги необходимо размещать по адресу url
     *
     * @var array
     */
    public $metaTags = [];

    /**
     * Название представления, которое отвечает за роль декоратора
     *
     * @var string
     */
    public $decorator = 'decorator';

    /**
     * Селектор, к которому привязывается всплывающее окно
     *
     * @var string
     */
    public $linkSelector = '.socialShareBlock i';

    /**
     * Путь до папки декоратора
     *
     * @var null|string
     */
    public $decoratorPath = null;

    /**
     * {@inherit}
     *
     * @return void
     */
    public function init()
    {
        SocialAsset::register($this->view);
    }

    /**
     * Запуск виджета
     *
     * @return string
     *
     * @throws \yii\base\InvalidParamException
     */
    public function run()
    {
        $js = '$("' . $this->linkSelector . '").yiiShareLinks();';
        $this->view->registerJs($js);
        $this->registerMetaTags();

        return $this->render($this->decorator, ['buttons' => $this->processButtons()]);
    }

    /**
     * Формируем структуру для отображения
     *
     * @return array
     *
     * @throws \yii\base\ErrorException
     */
    protected function processButtons()
    {
        $buttons = $this->buttons;

        if (empty($buttons)) {
            throw new ErrorException('Отсутствуют социальные кнопки');
        }

        return array_map(
            function ($value) {
                /* TODO проверку на наличие такой соц сети */
                $socialNetwork = $value['social'];
                $buttonSize = $value['size'] ?? self::BUTTON_SIZE_MD;
                $url = $value['url'] ?? urlencode(Yii::$app->getRequest()->getAbsoluteUrl());

                return [
                    'buttonClasses' => implode(
                        ' ',
                        ArrayHelper::merge(
                            [
                                'btn',
                                'btn-social-icon'
                            ],
                            [self::SOCIAL_NETWORKS_BUTTONS[$socialNetwork]],
                            [self::SOCIAL_NETWORKS_BUTTONS_SIZE[$buttonSize]]
                        )
                    ),
                    'iconClasses' => implode(
                        ' ',
                        ArrayHelper::merge(
                            ['fa'],
                            [self::SOCIAL_NETWORKS_ICONS[$socialNetwork]]
                        )
                    ),
                    'sharedLink' => self::SOCIAL_NETWORKS_SHARED_LINKS[$socialNetwork] . $url
                ];
            },
            $buttons
        );
    }

    /**
     * Регистрируем мета-тэги
     *
     * @return void
     */
    protected function registerMetaTags()
    {
        $metaTags = $this->metaTags;

        foreach ($metaTags as $key => $content) {
            $this->view->registerMetaTag(['name' => $key, 'content' => $content], $key);
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return null|string
     */
    public function getViewPath()
    {
        $path = parent::getViewPath();

        if ($this->decoratorPath !== null && is_string($this->decoratorPath) && strlen($this->decoratorPath) > 0) {
            $path = rtrim($this->decoratorPath, '\/') . DIRECTORY_SEPARATOR;
        }

        return $path;
    }
}

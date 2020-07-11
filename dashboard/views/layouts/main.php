<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\enums\AttachmentsEnum;
use common\enums\LanguagesEnum;
use dashboard\assets\AppAsset;
use dashboard\assets\AdminAsset;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<?php $this->beginBody() ?>

<div class="wrapper dashboard-style">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= Yii::$app->params['libraryUrl'] ?>" class="nav-link"><?= \Yii::t('app', 'Перейти на сайт') ?></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="dropdown nav-item">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                    <?= \Yii::t('app', 'Выберите язык') ?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li role="presentation"><a role="menuitem" class="dropdown-item" href="<?= Url::current(['language' => 'ru']) ?>"><?= LanguagesEnum::label('ru') ?></a></li>
                    <li role="presentation"><a role="menuitem" class="dropdown-item" href="<?= Url::current(['language' => 'kk']) ?>"><?= LanguagesEnum::label('kk') ?></a></li>
                </ul>
            </li>
            <li class="nav-item">
                <?= Html::beginForm(['/site/logout'], 'post') ?>
                    <button type="submit" class="btn btn-link nav-link logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden-xs hidden-sm hidden-md"><?= \Yii::t('app', 'Выход') ?></span>
                    </button>
                <?= Html::endForm(); ?>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <div class="brand-link">
            <img src="/images/adminLogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light" style="font-size: 15px"><?= \Yii::t('app', 'Панель администратора') ?></span>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/images/profile.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= Url::to(['/users/view', 'id' => Yii::$app->user->id]) ?>" class="d-block"><?= Yii::$app->user->identity->username ?></a>
                    <a href="#" style="font-size: 12px"><i class="fa fa-xs fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['users/index']) ?>" class="nav-link <?= $this->context->id == 'users' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p><?= \Yii::t('app', 'Пользователи') ?></p>
                            <span class="badge badge-info right">6</span>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['publications/index']) ?>" class="nav-link <?= $this->context->id == 'publications' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                <?= \Yii::t('app', 'Публикации') ?>
                                <span class="badge badge-info right">6</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['smart-spaces/index']) ?>" class="nav-link <?= $this->context->id == 'smart-spaces' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p><?= \Yii::t('app', 'Smart-пространства') ?></p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['/literature/books/index']) ?>" class="nav-link <?= $this->context->id == 'literature/books' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p><?= \Yii::t('app', 'Книги') ?></p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['/literature/newspapers/index']) ?>" class="nav-link <?= $this->context->id == 'literature/newspapers' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-newspaper-o"></i>
                            <p>
                                <?= \Yii::t('app', 'Газеты') ?>
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['/literature/magazines/index']) ?>" class="nav-link <?= $this->context->id == 'literature/magazines' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-table"></i>
                            <p><?= \Yii::t('app', 'Журналы') ?></p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['/feedbacks/index']) ?>" class="nav-link <?= $this->context->id == 'feedbacks' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p><?= \Yii::t('app', 'Отзывы') ?></p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="javascript:void(0)" class="nav-link <?= $this->context->id == 'categories' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-th"></i>
                            <p><?= \Yii::t('app','Разделы') ?></p>
                            <i class="fas fa-angle-left right"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= Url::to(['categories/index']) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Категории') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['categories/create']) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Создать новый раздел') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['categories/create', 'child' => true]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Создать новый подраздел') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="javascript:void(0)" class="nav-link <?= $this->context->id == 'attachments' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-thumb-tack"></i>
                            <p>
                                <?= \Yii::t('app', 'Вложения') ?>
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= Url::to(['attachments/index']) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Список вложении') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['/attachments/create', 't' => AttachmentsEnum::TYPE_IMAGE, 'rt' => AttachmentsEnum::RELATION_LIBRARY_LOGO]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Логотип библиотеки') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['/attachments/create', 't' => AttachmentsEnum::TYPE_IMAGE, 'rt' => AttachmentsEnum::RELATION_SMART_SPACES_MAP]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Карта smart-пространств') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['/attachments/create', 't' => AttachmentsEnum::TYPE_IMAGE, 'rt' => AttachmentsEnum::RELATION_AUTH_BLOCK_BACKGROUND]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Фон блока авторизации') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['/attachments/create', 't' => AttachmentsEnum::TYPE_IMAGE, 'rt' => AttachmentsEnum::RELATION_SLIDER]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Фото к слайдеру') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= Url::to(['/attachments/create', 't' => AttachmentsEnum::TYPE_VIDEO, 'rt' => AttachmentsEnum::RELATION_SLIDER]) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= \Yii::t('app', 'Видео к слайдеру') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-header"><?= \Yii::t('app', 'Дополнительные') ?></li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['settings/index']) ?>" class="nav-link <?= $this->context->id == 'settings' ? 'active' : '' ?>">
                            <i class="nav-icon far fa-plus-square"></i>
                            <p><?= \Yii::t('app', 'Настройки') ?></p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= Url::to(['questions/index']) ?>" class="nav-link <?= $this->context->id == 'questions' ? 'active' : '' ?>">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                <?= \Yii::t('app', 'Вопросы и ответы') ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['renewal-applications/index']) ?>" class="nav-link <?= $this->context->id == 'renewal-applications' ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-bookmark"></i>
                            <p><?= \Yii::t('app', 'Заявки на продление сроков чтения') ?></p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><?= \Yii::t('app', 'Главная') ?></a></li>
                    <li class="breadcrumb-item active"><?= $this->title ?></li>
                </ol>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?= Alert::widget() ?>
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title" style="font-weight: 600; font-size: 1.35rem"><?= $this->title ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="display: block;">
                        <?= $content ?>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Main Footer -->
    <footer class="main-footer d-flex justify-content-center flex-wrap">
        <strong>Copyright &copy; 2020 <a href="<?= Yii::$app->params['libraryUrl'] ?>"><?= \Yii::t('app', 'Библиотека') ?></a>.</strong>
        <?= \Yii::t('app', 'Все права зашищены.') ?>
    </footer>
</div>

<?php /*
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/users/index'],
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-light bg-dark',
        ],
    ]);
    $menuItems = [
        'menu' => [
            'label' => Yii::t('app', 'Меню'),
            'items' => [
                ['label' => Yii::t('app', 'Пользователи'), 'url' => Url::to(['/users/index'])],
                ['label' => Yii::t('app', 'Настройки'), 'url' => Url::to(['/settings/index'])],
                ['label' => Yii::t('app', 'Разделы'), 'url' => Url::to(['/categories/index'])],
                ['label' => Yii::t('app', 'Публикации'), 'url' => Url::to(['/publications/index'])],
                ['label' => Yii::t('app', 'Smart-пространства'), 'url' => Url::to(['/smart-spaces/index'])],
                ['label' => Yii::t('app', 'Вложения'), 'url' => Url::to(['/attachments/index'])],
                ['label' => Yii::t('app', 'Отзывы'), 'url' => Url::to(['/feedbacks/index'])],
                ['label' => Yii::t('app', 'Вопросы и ответы'), 'url' => Url::to(['/questions/index'])],
                ['label' => Yii::t('app', 'Заявки на продление сроков чтения'), 'url' => Url::to(['/renewal-applications/index'])],
                ['label' => Yii::t('app', 'Книги'), 'url' => Url::to(['/literature/books/index'])],
                ['label' => Yii::t('app', 'Газеты'), 'url' => Url::to(['/literature/newspapers/index'])],
                ['label' => Yii::t('app', 'Журналы'), 'url' => Url::to(['/literature/magazines/index'])],
            ],
        ],
        'language' => [
            'label' => Yii::t('app', 'Язык'),
            'items' => [
                'ru' => ['label' => LanguagesEnum::label('ru'), 'url' => Url::current(['language' => 'ru'])],
                'kk' => ['label' => LanguagesEnum::label('kk'), 'url' => Url::current(['language' => 'kk'])],
                'en' => ['label' => LanguagesEnum::label('en'), 'url' => Url::current(['language' => 'en'])],
            ]
        ]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                Yii::t('app', 'Выйти'),
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems,
    ]);
    NavBar::end();
//    ?>
</div>
 */ ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

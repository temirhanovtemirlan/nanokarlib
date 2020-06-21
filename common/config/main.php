<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ]
            ],
        ],
        'settingService' => [
            'class' => 'common\services\SettingService',
        ],
        'categoryService' => [
            'class' => 'common\services\CategoryService'
        ],
        'publicationService' => [
            'class' => 'common\services\PublicationService'
        ],
        'attachmentService' => [
            'class' => 'common\services\AttachmentService'
        ],
        'questionService' => [
            'class' => 'common\services\QuestionService',
        ],
        'smartSpaceService' => [
            'class' => 'common\services\SmartSpaceService',
        ],
        'feedbackService' => [
            'class' => 'common\services\FeedbackService',
        ],
        'renewalApplicationService' => [
            'class' => 'common\services\RenewalApplicationService'
        ],
        'literatureService' => [
            'class' => 'common\services\LiteratureService'
        ]
    ],
];

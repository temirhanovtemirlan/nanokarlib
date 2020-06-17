<?php /* @var $source string */ ?>
<div class="video-item">
<?= \lesha724\youtubewidget\Youtube::widget([
    'video' => $source,
    'iframeOptions'=>[
        'class' => 'youtube-video mw-100'
    ],
    'divOptions'=>[ /*for container div*/
        'class' => 'youtube-video-div text-center'
    ],
    'height'=>390,
    'width'=>640,
    'playerVars'=>[
        'controls' => 1,
        'autoplay' => 0,
        'showinfo' => 0,
        'modestbranding'=>  1,
        'fs' => 0,
        'disablekb' => 0
    ],
]); ?>
</div>

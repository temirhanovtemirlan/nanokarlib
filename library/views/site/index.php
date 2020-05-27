<?php

/* @var $this yii\web\View */
/* @var $title string */
/* @var $totalUsers string */
/* @var $librarySpace string */
/* @var $libraryFond string */
/* @var $authBlockBackground string */
/* @var $smartSpacesProvider common\filters\SmartSpaceFilter */
/* @var $questionsProvider common\filters\QuestionFilter */
/* @var $feedbackProvider common\filters\FeedbackFilter */
/* @var $smartSpacesMap string */

$this->title = $title;
?>

<div class="site-index">
    <?= $this->render('include/_authorization_block', [
        'totalUsers' => $totalUsers,
        'librarySpace' => $librarySpace,
        'libraryFond' => $libraryFond,
        'background' => $authBlockBackground,
    ]) ?>
    <?= $this->render('include/_slider') ?>
    <?= $this->render('include/_smart_spaces', [
        'dataProvider' => $smartSpacesProvider,
        'map' => $smartSpacesMap,
    ]) ?>
    <?= $this->render('include/_map') ?>
    <?= $this->render('include/_questions', [
        'dataProvider' => $questionsProvider,
    ]) ?>
    <?= $this->render('include/_feedback' , [
        'dataProvider' => $feedbackProvider,
    ])?>
</div>

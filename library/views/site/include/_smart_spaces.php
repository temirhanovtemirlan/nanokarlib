<?php
/* @var $dataProvider common\filters\SmartSpaceFilter */
/* @var $map string */
$models = $dataProvider->getModels();
if ($models) :
?>
<div class="smart-spaces">
    <?php foreach ($models as $model): ?>
    <div class="smart-space">

    </div>
    <?php endforeach;?>

    <div class="smart-spaces-map">
        <img src="<?= $map ?>">
    </div>
</div>
<?php endif; ?>
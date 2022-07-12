<?php $this->layout("LayoutTemplate", ["title" => "www.pown.it"]) ?>
<?php
/** @var int $currentId */
/** @var int $nextId */
/** @var int $randomId */
/** @var int $prevId */
/** @var float $views */
/** @var bool $fileExistsForId */
?>

<?php if($fileExistsForId): ?>
<script src="assets/js/libraries/ruffle/ruffle.js"></script>

<script type='application/javascript'>
    window.RufflePlayer = window.RufflePlayer || {};
    window.RufflePlayer.config = {
        'warnOnUnsupportedContent': false,
        'showSwfDownload': true,
    };
</script>

<div style="text-align: center; margin-bottom: 10px;">
    POWN Flash Loop <b><?= $currentId ?></b> | Views: <?= $views ?> ||
    <a href="<?= $prevId ?>">back</a> |
    <a href="<?= $randomId ?>">random</a> |
    <a href="<?= $nextId ?>">next</a>
</div>

<object id="player">
    <param name="movie" value="assets/vid/<?= $currentId ?>.swf">
    <embed src="assets/vid/<?= $currentId ?>.swf" width="800" height="600"></embed>
</object>

<?php else: ?>
<div style='text-align: center;'>
    <h2>Sorry, file for ID <?= $currentId ?> does not exist :(</h2>
    <p>It was probably deleted and was not even on original pown.it</p>

    <p>
        <a href="<?= $prevId ?>">back</a> |
        <a href="<?= $randomId ?>">random</a> |
        <a href="<?= $nextId ?>">next</a>
    </p>
</div>
<?php endif; ?>

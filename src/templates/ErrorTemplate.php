<?php $this->layout("LayoutTemplate", ["title" => "www.pown.it"]) ?>
<?php
/** @var string $message */
/** @var int $code */
?>

<h1>Error code: <?= $code ?></h1>
<h2>Sorry, but: <?= $message ?? "Unknown error" ?></h2>



<?php
$headTitle = "Machine à sous";
ob_start();
?>

<section class="container">
    <h1>Machine à sous</h1>
    <article class="slot-machine">
        <div class="reel" id="reel1">🍒</div>
        <div class="reel" id="reel2">🍒</div>
        <div class="reel" id="reel3">🍒</div>
    </article>

    <button id="spinButton">Lancer</button>
    
    <div id="result"></div>
    <script src="<?= "/sources/js/script.js?v=" . filemtime(ROOT."/sources/js/script.js") ?>"></script>
</section>

<?php
$mainContent = ob_get_clean();

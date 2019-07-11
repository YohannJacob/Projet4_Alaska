<?php
$ChapterManager = new ChapterManager();
$listChapter = $ChapterManager->getList('ASC');

?>
    <div class="burger"> <span></span> </div>
    <nav>
    <ul class="back">
            <li><a href="index.php"><i class="fas fa-igloo"></i>Home</a></li>
        </ul>

        <ul class="main">
            <?php foreach($listChapter as $chapterMenu) { ?>
                <li><a href="index.php?action=chapter&chapitre=<?= $chapterMenu->id(); ?>"> <?= $chapterMenu->chapterNumber() ?> / <?= $chapterMenu->title() ?> </a></li>
            <?php } ?>
        </ul>

        <ul class="sub">
            <li><a href="index.php?action=login">Connexion espace auteur</a></li>
        </ul>
    </nav>

    <div class="overlay"></div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $('.burger, .overlay').click(function() {
            $('.burger').toggleClass('clicked');
            $('.overlay').toggleClass('show');
            $('nav').toggleClass('show');
            $('body').toggleClass('overflow');
        });
    </script>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

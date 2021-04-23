<?php
includeView('header');

includeView('navbar', \App\Config::getInstance()->get('menu'));

includeView('masthead');
?>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <?php includeView('article', $this->data['article']); ?>
        </div>
    </section>

<?php
includeView('footer');

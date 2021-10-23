<?php
includeView('header');

includeView('navbar', \App\Config::getInstance()->get('menu'));

includeView('masthead');
?>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Последние публикации</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <?php if (!empty($this->data['articlesList'])):
                    foreach ($this->data['articlesList'] as $article):
                        includeView('articleItem', $article);
//                    echo "<pre>";
//                    var_dump($article['title']);
//                    echo "</pre>";
                    endforeach;
                else:
                    includeView('notFoundData');
                endif; ?>
            </div>
        </div>


        <!--        Paginator-->
        <?php if (count(json_decode($this->data['articlesList'], true)) > \App\Config::getInstance()->get('pagination.limit')):
            includeView('paginator');
        endif;
        includeView('subscription', ['isAuth' => !empty($isAuth) ?? null]); ?>


    </section>

<?php


includeView('footer');

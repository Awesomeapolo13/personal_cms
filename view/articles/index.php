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
                    endforeach;
                else:
                    includeView('notFoundData');
                endif; ?>
            </div>
        </div>


        <!--        Paginator-->
        <?php if ($this->data['fullCount'] > $this->data['limit']):
            includeView('paginator', [
                'pagesCount' => $this->data['pagesCount'],
                'nextPage' => $this->data['nextPage'],
                'previousPage' => $this->data['previousPage'],
            ]);
        endif;
        includeView('subscription', ['isAuth' => !empty($isAuth) ?? null]); ?>
    </section>

<?php

includeView('footer');

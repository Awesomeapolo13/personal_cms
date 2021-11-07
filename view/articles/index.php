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
                <?php if (!empty($this->data['paginator']->paginate())):
                    foreach ($this->data['paginator']->paginate() as $article):
                        includeView('articleItem', $article);
                    endforeach;
                else:
                    includeView('notFoundData');
                endif; ?>
            </div>
        </div>

        <!--        Paginator-->
        <?php
        $this->data['paginator']->renderPaginator(); // отображаем пагинатор
        includeView('subscription', ['isAuth' => !empty($isAuth) ?? null]); ?>
    </section>

<?php

includeView('footer');

<div class="col-lg-4 col-sm-6 mb-4">
    <div class="portfolio-item">
        <a class="portfolio-link" href="/article/<?= $data->id ?>">
            <div class="portfolio-hover">
                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
            </div>

            <img class="img-fluid"
                 src="<?php if (!empty($data->img)): ?>
                 /public/assets/img/portfolio/01-thumbnail.jpg"  alt=""/>
            <?php else: ?>
                /public/assets/img/article/default.jpg"  alt="default image"/>
            <?php endif; ?>
        </a>
        <div class="portfolio-caption">
            <div class="portfolio-caption-heading">
                <?= !empty($data->title) ? $data->title : 'Не удалось получить заголовок' ?>
            </div>
            <div class="portfolio-caption-subheading text-muted">
                <?= !empty($data->description) ? $data->description : 'Не удалось получить описание'?>
            </div>
            <div class="portfolio-caption-subheading text-muted">
                Дата публикации: <?= !empty($data->created_at) ? $data->created_at : 'Не удалось получить дату публикации'?>
            </div>
        </div>
    </div>
</div>

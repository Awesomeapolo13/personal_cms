<div class="portfolio-modal" id="portfolioModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body">
                            <!-- Project Details Go Here-->
                            <h2 class="text-uppercase"><?= $data[0]->title ?></h2>
                            <p class="item-intro text-muted"><?= $data[0]->description ?>.</p>
                            <img class="img-fluid d-block mx-auto" src="/public/assets/img/portfolio/01-full.jpg"
                                 alt=""/>
                            <p><?= $data[0]->body ?></p>
                            <ul class="list-inline">
                                <li>Date: <?= $data[0]->created_at ?></li>
                            </ul>
                            <button class="btn btn-primary" data-dismiss="modal" type="button">
                                <!--                                <i class="fas fa-times mr-1"></i>-->
                                <!--                                <a class="nav-item js-scroll-trigger" href="/">Назад</a>-->
                                К списку публикаций
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="portfolio-modal" id="portfolioModal1" tabindex="-1" role="dialog">
    <!--<div class="row">-->
    <div class="row justify-content-center">
        <div class="col-2 ml-md-5">
            <img class="img-thumbnail"
                 src="/public/assets/img/user/default.png"
                 alt="author avatar">
        </div>
        <div class="col-6">
            <p><span>Имя Фамилия</span></p>
            <form action="">
                <div class="form-group">
                    <label for="comment-text-area"></label>
                    <textarea name="comment-body" id="comment-text-area" cols="30" rows="3" class="form-control">Оставьте комментарий...</textarea>
                </div>
                <button class="btn btn-primary" type="button" id="button-addon2">Отправить</button>
            </form>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-2 ml-md-5">
            <img class="img-thumbnail"
                 src="/public/assets/img/user/default.png"
                 alt="user avatar">
        </div>
        <div class="col-6">
            <p><span>Имя Фамилия</span></p>
            <div class="mb-3">
                <p>Текст комментария</p>
                <p>Дата публикации:</p>
            </div>
        </div>
    </div>
</div>

<?php
includeView('header');

includeView('navbar', \App\Config::getInstance()->get('menu'));

?>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $this->data['title'] ?></h2>
                <h3 class="mb-3 section-subheading text-muted">Для регистрации обязательно заполните все поля ниже</h3>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <form class="col-md-4 text-center">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                               placeholder="Иван Иванов" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email"
                               placeholder="example@mail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password-repeat">Повторите пароль</label>
                        <input type="password" class="form-control" id="password-repeat" name="password-repeat"
                               required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rules-agreement">
                        <label class="form-check-label" for=rules-agreement">Согласен с <a href="/rules">правилами</a>
                            сайта</label>
                    </div>
                    <div class="form-group">
                        <p class="alert alert-danger">Что-то некорректно (а может у нас упал сервер)</p>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sign_in">Войти</button>
                    <p class="mt-3"><a href="/login">Авторизоавться</a></p>
                </form>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>

<?php
includeView('footer');

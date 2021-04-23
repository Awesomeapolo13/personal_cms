<?php
includeView('header');

includeView('navbar', \App\Config::getInstance()->get('menu'));

?>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $this->data['title'] ?></h2>
                <h3 class="mb-3 section-subheading text-muted">Введите email и пароль для авторизации</h3>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <form class="col-md-4 text-center">
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
                        <p class="alert alert-danger">Некорректный логин или пароль (а может у нас упал сервер)</p>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sign_in">Войти</button>
                    <p class="mt-3"><a href="/register">Регистрация</a></p>
                </form>
                <div class="col-md-4"></div>
            </div>
        </div>
    </section>

<?php
includeView('footer');

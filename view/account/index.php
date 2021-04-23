<?php
includeView('header');

includeView('navbar', \App\Config::getInstance()->get('menu'));

?>
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?= $this->data['title'] ?></h2>
                <h3 class="mb-3 section-subheading text-muted">Здесь вы можете дополнить или изменить свои данные</h3>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <form class="col-md-4 text-center">
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input type="email" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                               value="<?= !empty($this->data['name']) ? htmlspecialchars($this->data['name']) : null ?>"
                               placeholder="Иван Иванов" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                               name="email" <?= !empty($this->data['email']) ? htmlspecialchars($this->data['email']) : null ?>
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
                    <div class="form-group">
                        <label for="description">О себе</label>
                        <textarea class="form-control" id="description" rows="3"
                                  name="description"><?= !empty($this->data['description']) ? htmlspecialchars($this->data['description']) : null ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="avatar">Добавить изображение профиля</label>
                        <input type="file" class="form-control-file" id="avatar" name="avatar">
                    </div>
                    <div class="form-group">
                        <p class="alert alert-danger">Что-то некорректно (а может у нас упал сервер)</p>
                    </div>
                    <button type="submit" class="btn btn-primary" name="sign_in">Войти</button>
                </form>
                <div class="col-md-4"></div>
            </div>
            <?php includeView('subscription');?>
        </div>
    </section>

<?php
includeView('footer');


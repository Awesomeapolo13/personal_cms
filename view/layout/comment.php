<div class="row">
    <div class="col-2 ml-md-5">
        <img class="img-thumbnail"
             src="<?= (!empty($data[0]->img)) ?
                 '/public/assets/img/user/' . $data[0]->img
                 :
                 '/public/assets/img/user/default.png' ?>"
             alt="Изображение пользователя">
    </div>
    <div class="col-6">
        <div class="col-6">
            <p><span><?= $data[0]->first_name ?> <?= $data[0]->last_name ?></span></p>
            <div class="mb-3">
                <p><?= $data[0]->body ?></p>
                <p><?= $data[0]->created_at ?></p>
            </div>
        </div>
    </div>
</div>

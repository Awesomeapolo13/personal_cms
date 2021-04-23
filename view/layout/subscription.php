<div class="row justify-content-center mt-3">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
        <?= empty($data['hasSubscribe']) ? 'Подписаться' : 'Отписаться' ?>
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Подписаться</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>После подтверждения подписки Вам на электронную почту будут регулярно приходить сообщения о
                    новых статьях нашего блога</p>
                <form action="">
                    <div class="form-group" <?= empty($data['isAuth']) ? null : 'hidden' ?>>
                        <label for="subscriber_email">Email</label>
                        <input type="email" class="form-control" id="subscriber_email" name="subscriber_email"
                               aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Ваша почта в надежных руках.</small>
                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-primary"
                                name="<?= empty($data['hasSubscribe']) ? 'subscribe' : 'unsubscribe' ?>">
                            <?= empty($data['hasSubscribe']) ? 'Подписаться' : 'Отписаться' ?>
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

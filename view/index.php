<?php
includeView('header');
?>

    <div class="container">
        <h1><?= $this->data['title'] ?></h1>
        <h2>My books</h2>
        <?php foreach ($this->data['books'] as $book): ?>
            <h4><?= $book['author'] ?></h4>
            <p><?= $book['name'] ?></p>
        <?php endforeach; ?>

        <h4>Напишите статью!</h4>
        <form action="/posts" method="post">
            <input type="text" name="title" placeholder="Заголовок статьи">
            <input type="text" name="body" placeholder="Тело статьи">
            <input type="submit" name="send" value="Отправить">
        </form>

        <h4>Загрузите товары</h4>
        <form action="/products/something" method="post">
            <input type="text" name="title" placeholder="Товар">
            <input type="text" name="body" placeholder="Цена">
            <input type="submit" name="send" value="Отправить">
        </form>
    </div>

<?php
includeView('footer');


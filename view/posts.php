<?php
includeView('header'); ?>

    <div class="container">
        <h1><?= $this->data['title'] ?></h1>
    </div>

<?php foreach ($_POST as $postData): ?>
    <h4><?= $postData ?></h4>
<?php endforeach; ?>

<?php
includeView('footer');

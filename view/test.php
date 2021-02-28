<?php
includeView('header'); ?>

    <div class="container">
        <h1><?= $this->data['title'] ?></h1>

        <ul>
            <li><?= $param1 ?></li>
            <li><?= $param2 ?></li>
        </ul>
    </div>
<?php
includeView('footer');

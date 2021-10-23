<?php
includeView('admin/header', ['title' => $this->data['title']]);
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-2 text-gray-800"><?= $this->data['title'] ?></h1>
            <p class="mb-4">В этом разделе указана информация о комментариях</p>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?= includeView('admin/table', [
            'title' => 'Список комментариев',
            'templateName' => 'article_table_row',
        ]) ?>
    </div>

<?php
includeView('admin/footer');

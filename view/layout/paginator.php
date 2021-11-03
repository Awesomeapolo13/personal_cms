<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="<?= path('?page=' . $data['previousPage']) ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($pageNumber = 1; $pageNumber <= $data['pagesCount']; $pageNumber++): ?>
            <li class="page-item">
                <a class="page-link" href="<?= path('?page=' . $pageNumber) ?>">
                    <?= $pageNumber ?>
                </a>
            </li>
        <?php endfor ?>
        <li class="page-item">
            <a class="page-link" href="<?= path('?page=' . $data['nextPage']) ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

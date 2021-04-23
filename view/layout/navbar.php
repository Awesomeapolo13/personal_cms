<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-shrink" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/"><img src="/public/assets/img/navbar-logo.svg"
                                                                alt=""/></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ml-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                <?php foreach ($data['main'] as $item): ?>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger"
                                            href="<?= $item['path'] ?>"><?= $item['title'] ?></a></li>
                    <!--                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>-->
                    <!--                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>-->
                    <!--                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>-->
                    <!--                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>-->
                <?php endforeach ?>
                <?php foreach ($data['user'] as $item):
                    if (!empty($_SESSION['isAuth']) && $item['isAuth']): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger"
                                                href="<?= $item['path'] ?>"><?= $item['title'] ?></a></li>
                    <?php elseif (empty($_SESSION['isAuth']) && !$item['isAuth']): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger"
                                                href="<?= $item['path'] ?>"><?= $item['title'] ?></a></li>
                    <?php endif;
                endforeach ?>
            </ul>
        </div>
    </div>
</nav>

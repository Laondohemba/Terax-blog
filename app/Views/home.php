<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
<?php if(session()->get('username')) : ?>
    <?= include('layouts/user_navbar.php') ?>

    <?php else : ?>
        <?= $this->include('layouts/navbar') ?>
<?php endif ?>

<div class="container bg-light p-5 my-5">
    <h3 class="text-center">Recent Posts</h3>

    <?php

    use CodeIgniter\I18n\Time; ?>
    <?php if ($posts) : ?>
        <div class="row">
            <?php foreach ($posts as $post) : ?>
                <div class="col-sm-6">
                    <div class="card my-2" style="width: 27rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <img src="<?= base_url($post['image']) ?>" class="card-img-top" alt="<?= $post['title'] ?>">
                            <p class="card-subtitle my-3 text-body-secondary">Updated <?= Time::parse($post['updated_at'])->humanize() ?> </p>
                            <p class="card-text"><?= word_limiter($post['body'], 20) ?>
                                <a href="<?= base_url('posts/view/' . $post['id']) ?>" class="text-decoration-none">see more</a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p class="display-6 my-5">No posts available.</p>
    <?php endif ?>
</div>
<?= $this->endSection() ?>

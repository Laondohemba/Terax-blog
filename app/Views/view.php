<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/user_navbar') ?>

<div class="container my-3">
<?php use CodeIgniter\I18n\Time; ?>

    <div class="w-75 mx-auto bg-light p-5">
        <a href="<?= base_url('/') ?>" class="text-decoration-none">Back to Posts</a>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="text-bg-success p-2">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif ?>

        <img src="<?= base_url($post['image']) ?>" alt="<?= $post['title'] ?>" class="img-fluid my-3">
        <h4 class="display-4 text-center"> <?= $post['title'] ?> </h4>
        <h6 class="card-subtitle my-2 text-body-secondary text-center">Last updated: <?= Time::parse($post['updated_at'])->humanize() ?> </h6>
        <p> <?= $post['body'] ?> </p>

        <div class="row">
            <div class="col-3 col-sm-2 col-md-1">
                <form action="<?= base_url('posts/like/' . $post['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <button class="btn" title="Like this post">
                        <i class="fa fa-thumbs-o-up" style="font-size:24px; color:green"></i>
                    </button>
                </form>
            </div>
            <div class="col mt-2">
                <?= esc($likes) ?> likes
            </div>
        </div>

        <form action="<?= base_url('comments/store/' . $post['id']) ?>" method="post" class="p-5">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment</label>
                <textarea name="comment" id="comment" rows="6" class="form-control"><?= set_value('comment') ?></textarea>
                <p class="text-danger"> <?= isset($validation) ? $validation->showError('comment') : '' ?> </p>
            </div>

            <?php if (isset($error)) : ?>
                <p class="text-danger"> <?= esc($error) ?> </p>
            <?php endif ?>

            <div class="mb-3">
                <button class="btn btn-secondary w-100" type="submit">Post comment</button>
            </div>
        </form>

        <?php if (isset($comments)) : ?>
            <h4>Recent comments</h4>
            <?php foreach ($comments as $comment) : ?>
                <div class="card mb-3 p-2">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center">
                                    <i class="fa fa-user" style="font-size:34px"></i>
                                    <h5><?= ucwords($comment['username']) ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <?= $comment['comment_body'] ?>
                                <h6 class="card-subtitle my-2 text-body-secondary"> <?= Time::parse($comment['created_at'])->humanize() ?> </h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else : ?>
            <h4>No comments yet</h4>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection() ?>
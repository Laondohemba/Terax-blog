<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/user_navbar') ?>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata() ?>
    </div>
<?php endif ?>

<div class="container bg-light p-5 my-5">
    <h3 class="text-center"><?= ucwords(session()->get('username')) ?>'s Posts</h3>

    <?php use CodeIgniter\I18n\Time; ?>
    <?php if ($posts) : ?>
        <div class="row">
            <div class="col-12">
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="text-bg-success p-2 w-75 mx-auto">
                        <?= session()->getFlashdata('success') ?>
                    </div>

                <?php elseif(session()->getFlashdata('error')) : ?>
                    <div class="text-bg-danger p-2 w-75 mx-auto">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif ?>
            </div>
            <?php foreach ($posts as $post) : ?>
                <div class="col-sm-6">
                    <div class="card my-2" style="width: 27rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <img src="<?= base_url($post['image']) ?>" class="card-img-top" alt="<?= $post['title'] ?>">
                            <h6 class="card-subtitle my-3 text-body-secondary">Updated <?= Time::parse($post['updated_at'])->humanize() ?> </h6>
                            <p class="card-text"><?= word_limiter($post['body'], 20) ?>
                                <a href="<?= base_url('posts/post/' . $post['id']) ?>" class="text-decoration-none">see more</a>
                            </p>
                            <a href="<?= base_url('posts/update/' . $post['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#<?= $post['id'] ?>">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="<?= $post['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want delete this post?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <small class="text-muted">Deleted posts cannot recovered</small>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <a href="<?= base_url('posts/delete/' . $post['id']) ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p class="display-6 my-5">You have no posts yet.</p>
    <?php endif ?>
</div>

<?= $this->endSection() ?>


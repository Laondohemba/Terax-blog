<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/user_navbar') ?>

<div class="container my-3">

    <div class="w-75 mx-auto bg-light p-5">
        <a href="<?= base_url('user/dashboard') ?>" class="text-decoration-none">Back to Posts</a>
        <h4 class="display-4 text-center"> <?= $post['title'] ?> </h4>
        <img src="<?= base_url($post['image']) ?>" alt="<?= $post['title'] ?>" class="img-fluid my-3">
        <p> <?= $post['body'] ?> </p>
    </div>
</div>

<?= $this->endSection() ?>
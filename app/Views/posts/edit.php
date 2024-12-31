<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<?= $this->include('layouts/user_navbar') ?>

<div class="container my-3">
    <form action="<?= base_url('posts/update/' . $post['id']) ?>" method="post" enctype="multipart/form-data" class="w-50 bg-light p-5 mx-auto">
        <?= csrf_field() ?>
        <h3 class="text-center">Edit Post</h3>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?= $post['title'] ?>">
            <p class="text-danger"> <?= isset($validation) ? $validation->showError('title') : '' ?> </p>
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" id="body" rows="8" class="form-control"><?= $post['body'] ?></textarea>
            <p class="text-danger"> <?= isset($validation) ? $validation->showError('body') : '' ?> </p>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            <p class="text-danger"> <?= isset($validation) ? $validation->showError('image') : '' ?> </p>
        </div>
        <?php if(isset($editError)) : ?>
            <div class="text-bg-danger p-2 mb-3">
                <?= esc($editError)?>
            </div>
        <?php endif ?>
        <div class="mb-3">
            <button class="btn btn-secondary w-100">Update</button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
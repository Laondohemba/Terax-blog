<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<form action="<?= base_url('login') ?>" method="POST" class="bg-light w-50 p-5 my-5 mx-auto">
    <?= csrf_field() ?>
    <h3 class="text-center">Login</h3>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= old('username') ?>">
        <p class="text-danger"><?= isset($validation) ? $validation->showError('username') : '' ?></p>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <p class="text-danger"><?= isset($validation) ? $validation->showError('password') : '' ?></p>
    </div>

    <?php if (isset($loginError)) : ?>

        <p class="text-danger"> <?= $loginError ?> </p>

    <?php endif; ?>

    <div class="mb-3">
        <button class="btn btn-secondary w-100">Login</button>
    </div>
</form>
<?= $this->endSection() ?>
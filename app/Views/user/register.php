<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>

<form action="<?= base_url('user/create') ?>" method="POST" class="bg-light w-50 p-5 my-5 mx-auto">
    <?= csrf_field() ?>
    <h3 class="text-center">Register</h3>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= set_value('username') ?>">
        <p class="text-danger"><?= isset($validation) ? $validation->showError('username') : '' ?></p>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= set_value('email') ?>">
        <p class="text-danger"><?= isset($validation) ? $validation->showError('email') : '' ?></p>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        <p class="text-danger"><?= isset($validation) ? $validation->showError('password') : '' ?></p>
    </div>

    <?php if( isset($error)): ?>

        <p class="text-danger"><?= $error ?></p>
    
    <?php endif ?>

    <div class="mb-3">
        <button class="btn btn-secondary w-100">Submit</button>
    </div>
</form>

<?= $this->endSection() ?>
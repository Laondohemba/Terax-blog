<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>
    <h2>Register</h2>
    <form action="<?= base_url('user/create') ?>" method="post">
        <input type="text" name="username">
        <br>
        <input type="text" name="email">
        <br>
        <input type="text" name="password">

        <br>
        <button type="submit">Submit</button>
    </form>
    <?= $this->endSection() ?>
    
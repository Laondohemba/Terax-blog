<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url('/') ?>">Terax Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">Home</a>
        </li>
      </ul>
      <a href="<?= base_url('login') ?>" class="btn btn-primary btn-sm me-3">Login</a>
      <a href="<?= base_url('user/create') ?>" class="btn btn-success btn-sm">Sign up</a>
    </div>
  </div>
</nav>
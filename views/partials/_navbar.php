<nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
  <a class="navbar-brand" href="<?= URL_BASE ?>user/index/">Prueba PHP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php if (isset($_SESSION['usuario']['id'])) : ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION['usuario']['nombre'] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <!-- <hr> -->
            <a class="dropdown-item" href="<?= URL_BASE ?>user/salir/">Salir</a>
          </div>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL_BASE ?>user/index/">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL_BASE ?>user/register/">Register</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
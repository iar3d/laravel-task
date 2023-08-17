<nav class="navbar navbar-expand navbar-light bg-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home">Головна</a>
        </li>
        @auth('web')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('task'); }}">Завдання</a>
        </li>
        @endauth
      </ul>
      <span class="navbar-text">
        @auth('web')
        <a href="{{ route('loginOut'); }}">Вийти</a>
        @endauth
        @guest('web')
        <a href="{{ route('login2'); }}">Вхід</a>
        @endguest
      </span>
    </div>
  </div>
</nav>

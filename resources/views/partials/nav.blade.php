<style>
  .nav-register:hover {
    background: rgba(255, 200, 30, 0.15) !important;
    border-color: #FFD966 !important;
  }
  .nav-login:hover {
    background: #FFD966 !important;
    border-color: #FFD966 !important;
  }
  .navbar-brand:hover {
    opacity: 0.85;
  }
</style>

<nav style="
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 80px;
  background: linear-gradient(to right, #3852B4, #3852B4);
  border-bottom: 3px solid #FFC81E;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0px 32px;
  z-index: 1000;
  box-sizing: border-box;
">
  <div>
    <a class="navbar-brand" href="{{ route('index') }}" style="
      color: #ffffff;
      font-size: 25px;
      font-weight: 500;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      transition: opacity 0.2s;
    ">
      Student Portal
    </a>
  </div>

  @unless(request()->routeIs('auth.login', 'auth.register', 'page.home', 'page.profile', 'page.updateprofile'))
  <div>
    <ul style="list-style: none; margin: 0; padding: 0; display: flex; gap: 12px; align-items: center;">
      <li>
        <a href="{{ route('auth.register') }}" class="nav-register" style="
          color: #FFC81E;
          text-decoration: none;
          font-size: 14px;
          padding: 8px 20px;
          border: 1.5px solid #FFC81E;
          border-radius: 50px;
          transition: background 0.2s, border-color 0.2s;
        ">Register</a>
      </li>
      <li>
        <a href="{{ route('auth.login') }}" class="nav-login" style="
          color: #1a1a1a;
          text-decoration: none;
          font-size: 14px;
          font-weight: 500;
          padding: 8px 20px;
          background: #FFC81E;
          border: 1.5px solid #FFC81E;
          border-radius: 50px;
          transition: background 0.2s, border-color 0.2s;
        ">Login</a>
      </li>
    </ul>
  </div>
  @endunless
</nav>
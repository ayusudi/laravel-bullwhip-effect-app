@include('layouts.head')
<style>
img {
  aspect-ratio: 1/1;
  width: 50vw;
  height: auto;
  object-fit: contain;
  margin: 0 auto;
}
</style>
  <body>
  <nav class="navbar navbar-expand-lg navbar-primary bg-primary">
  <div class="container d-flex justify-content-between">
    <a class="navbar-brand text-light" href="#">TK4 Team 4 JOBA</a>
    <div id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @if (\Session::get('username'))
        <li class="nav-item">
          <a class="nav-link text-light" href="/logout">Logout</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link text-light" href="/login">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
    <div class="container">
      <div id="carouselExampleInterval" class="carousel slide py-2" data-bs-ride="carousel">
      <div class="carousel-inner m-auto">
        <div class="carousel-item active" data-bs-interval="15000">
          <img src="https://cdn-chkij.nitrocdn.com/PvHwcyBkfPOahtKQqMidXquYeYSSTUka/assets/images/optimized/rev-886f4a6/wp-content/uploads/2021/07/task-management-8.png" class="d-block" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="https://images.prismic.io/hiverywebsite/e32190cd-5e22-48e9-9bdd-57a7b6cda639_PNG+-+Bullwhip+Effect+and+Current+Retail+Supply+Chain+Issues+.png?auto=compress,format" class="d-block"  alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://i.ytimg.com/vi/iALiS4FBB6E/maxresdefault.jpg"  class="d-block" alt="...">
        </div>
        <div class="carousel-item">
          <img src="ERD.png"  class="d-block" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-primary p-1 rounded" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-primary p-1 rounded" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      </div>
    </div>
  </body>
</html>
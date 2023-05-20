<?php
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$jsonData = file_get_contents("http://109.120.181.142/api/");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>News</title>
  <link rel="stylesheet" href="../css/bootstrap-grid.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/News.css">
  <link rel="stylesheet" href="../css/sidebar.css">
</head>
<body>
<nav class="navbar navbar-light ">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header" style="background-color: #163E73">
        <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body" style="background-color: #163E73">
        <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 ">
          <li class="nav-item">
            <a class="navbar-brand" href="TimeTable.html">
              <img src="../img/Timetable_icon.png" class="d-inline-block" alt="">
              Расписание
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="Users.php">
              <img src="../img/Users_icon.png" class="d-inline-block" alt="">
              Пользователи
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="Rooms.php">
              <img src="../img/Audience_icon.png" class="d-inline-block" alt="">
              Аудитории
            </a>
          </li>
          <li class="nav-item" style="background-color: #0a53be;">
            <a class="navbar-brand" href="News.php">
              <img src="../img/News_icon.png" class="d-inline-block" alt="">
              Новости
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="Marks.html">
              <img src="../img/Marks_icon.png" class="d-inline-block" alt="">
              Оценки
            </a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="AcceptRooms.php">
              <img src="../img/Marks_icon.png" class="d-inline-block" alt="">
              Бронирование
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div class="container">


  <div class="btn-up btn-up_hide"></div>

  <div class="input-group rounded">
    <input type="search" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
            <a href="#" style="text-decoration: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </a>
    </span>
  </div><br>

  <div class="group">

    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ffffff; color: black">
        Сортировать
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Сортировать по дате</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по названию</a></li>
      </ul>

      <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Добавить
      </button>

    </div>

  </div><br>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление новости</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Название</label>
          </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Описание</label>
          </div>
          <div class="mb-3" style="padding-top: 15px">
            <input class="form-control" type="file" id="formFile">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mx-auto">Опубликовать</button>
        </div>
      </div>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
      <div class="card h-100">
        <img src="../img/rector.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Будущее начинается здесь: гимназии РУТ (МИИТ) – 70 лет</h5>
          <p class="card-text">17 апреля в Зале Торжеств Российского университета транспорта состоялось награждение учителей и сотрудников по случаю 70-летия Гимназии РУТ (МИИТ). <a href="#">Подробнее</a></p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Добоавлено: 18 апреля 2019 года.</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="../img/rector.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Будущее начинается здесь: гимназии РУТ (МИИТ) – 70 лет</h5>
          <p class="card-text">17 апреля в Зале Торжеств Российского университета транспорта состоялось награждение учителей и сотрудников по случаю 70-летия Гимназии РУТ (МИИТ). <a href="#">Подробнее</a></p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Добоавлено: 18 апреля 2019 года.</small>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100">
        <img src="../img/rector.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Будущее начинается здесь: гимназии РУТ (МИИТ) – 70 лет</h5>
          <p class="card-text">17 апреля в Зале Торжеств Российского университета транспорта состоялось награждение учителей и сотрудников по случаю 70-летия Гимназии РУТ (МИИТ). <a href="#">Подробнее</a></p>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Добоавлено: 18 апреля 2019 года.</small>
        </div>
      </div>
    </div>
  </div>
  <br>
  <nav aria-label="">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link">Страницы:</a>
      </li>
      <li class="page-item active"><a class="page-link" href="#">1</a></li>
      <li class="page-item" aria-current="page">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">Следующая</a>
      </li>
    </ul>
  </nav>

</div>

<script src="../js/bootstrap.bundle.js"></script>
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
</body>
</html>
<?php

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$jsonData = file_get_contents("http://109.120.181.142/api/timetables?page=". $current_page);

// Декодирование JSON-данных в ассоциативный массив
$data = json_decode($jsonData, true);

$total_pages = $data['hydra:view']['hydra:last'];

// Вывод ссылок на страницы
for ($page = 1; $page <= $total_pages; $page++) {
    // Проверка, является ли текущая страница активной
    $active_class = ($page == $current_page) ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TimeTable</title>
  <link rel="stylesheet" href="../css/bootstrap-grid.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../css/TimeTable.css">
  <link rel="stylesheet" href="../css/sidebar.css">
</head>
<body>
<!--Start NavBar-->
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
          <li class="nav-item" style="background-color: #0a53be;">
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
          <li class="nav-item">
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
<!--End NavBar-->

<div class="container">

  <div class="btn-up btn-up_hide"></div> <!--Button for up scrolling-->
  <!--Start Container for search panel-->
  <div class="input-group rounded">
    <!-- Start Search and icon-->
    <input type="search" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" />
    <span class="input-group-text border-0" id="search-addon">
      <a href="#" style="text-decoration: none">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </a>
    </span>
    <!-- End Search and icon-->
  </div><br>
  <!--Start Container for search panel-->

  <div class="group">

    <div class="dropdown">
      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ffffff; color: black">
        Сортировать
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Сортировать по ID</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по неделе</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по паре</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по группе</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по предмету</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по преподавателю</a></li>
        <li><a class="dropdown-item" href="#">Сортировать по аудитории</a></li>
      </ul>

      <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Добавить
      </button>

    </div>

  </div><br>

  <!--Start Modal window for add timetable-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <select class="form-select mb-3" aria-label="Default select example">
            <option selected>Неделя</option>
            <option value="1">1 неделя</option>
            <option value="2">2 неделя</option>
          </select>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">День недели</label>
          </div>
          <select class="form-select mb-3" aria-label="Default select example">
            <option selected>Пара</option>
            <option value="1">1 пара</option>
            <option value="2">2 пара</option>
            <option value="2">3 пара</option>
            <option value="2">4 пара</option>
            <option value="2">5 пара</option>
            <option value="2">6 пара</option>
          </select>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput2" placeholder="Технология хранения данных">
            <label for="floatingInput">Предмет</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput3" placeholder="Новиков А.И.">
            <label for="floatingInput">Преподаватель</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput4" placeholder="1308">
            <label for="floatingInput">Номер аудитории</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary mx-auto">Добавить</button>
        </div>
      </div>
    </div>
  </div>
  <!--End Modal window for add timetable-->

  <!--Create structure the table-->
  <table class="table">
    <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Неделя</th>
      <th scope="col">День</th>
      <th scope="col">Пара</th>
      <th scope="col">Группа</th>
      <th scope="col">Предемет</th>
      <th scope="col">Преподаватель</th>
      <th scope="col">№ Аудитории</th>
    </tr>
    </thead>
    <!--End structure the table-->

    <!--Start Description the table-->
    <tbody>
    <?php
    foreach ($data['hydra:member'] as $index => $item) {
      $idString = $item['@id']; // Получение строки "@id"
      $startPosition = strrpos($idString, '/') + 1;
      $id = substr($idString, $startPosition); // Извлечение номера id

      ?>
      <tr>
        <th scope="row"><?php echo $id; ?></th>
        <td><?php $lessonNumber = $item['lesson']['lessonNumber'];
          echo $lessonNumber ?></td>
        <td><?php $dayNumber = $item['day']['dayNumber'];
          echo $dayNumber . "\n" ?></td>
        <td><?php $lessonNumber = $item['lesson']['lessonNumber'];
          echo $lessonNumber . "\n" ?></td>
        <td><?php $squadName = $item['squad']['squadName'];
          echo $squadName . "\n" ?></td>
        <td><?php $subjectName = $item['subject']['subjectName'];
          echo $subjectName ?></td>
        <td><?php //TO DO ?></td>
        <td><?php $locationNumber = $item['location'][0]['locationNumber'];
          echo $locationNumber ?></td>
      </tr>
      <?php
    }
    ?>

    </tbody>
  </table>
  <!--Start Description the table-->

  <!--Start Description the pages in end page-->
  <nav aria-label="...">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link">Страницы:</a>
      </li>
      <?php
      $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

      // Определение диапазона страниц
      $start_page = max(1, $current_page - 3);
      $end_page = min($start_page + 6, 63);

      // Отображение всегда первой страницы
      ?>
      <li class="page-item <?php echo ($current_page == 1) ? 'active' : ''; ?>">
        <a class="page-link" href="http://localhost:8888/RUT/html/TimeTable.php?page=1">1</a>
      </li>
      <?php

      for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == 1) {
          continue; // Пропуск первой страницы, так как она уже отображена
        }

        $active_class = ($i == $current_page) ? "active" : "";
        ?>
        <li class="page-item <?php echo $active_class; ?>">
          <a class="page-link" href="http://localhost:8888/RUT/html/TimeTable.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
        <?php
      }

      // Определение ссылки для кнопки "Следующая"
      $next_page = $current_page + 1;
      $next_page_url = "http://localhost:8888/RUT/html/TimeTable.php?page=" . $next_page;
      ?>

      <li class="page-item">
        <a class="page-link" href="<?php echo $next_page_url; ?>">Следующая</a>
      </li>
    </ul>
  </nav>

</div>

<script src="../js/bootstrap.bundle.js"></script>
<script>
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
<script src="../js/home.js"></script>
</body>
</html>
<?php

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$jsonData = file_get_contents("http://109.120.181.142/api/locations?page=". $current_page);

// Декодирование JSON-данных в ассоциативный массив
$data = json_decode($jsonData, true);

$locationNumbers = array_column($data['hydra:member'], 'locationNumber');

$total_pages = $data['hydra:view']['hydra:last'];

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Rooms</title>
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/Rooms.css">
</head>
<body>
<nav class="navbar navbar-light">
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
                            <img src="../img/Timetable_icon.png" width="30" height="50" class="d-inline-block" alt="">
                            Расписание
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="Users.php">
                            <img src="../img/Users_icon.png" width="30" height="50" class="d-inline-block" alt="">
                            Пользователи
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: #0a53be;">
                        <a class="navbar-brand" href="Rooms.php">
                            <img src="../img/Audience_icon.png" width="30" height="50" class="d-inline-block" alt="">
                            Аудитории
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="News.php">
                            <img src="../img/News_icon.png" width="30" height="50" class="d-inline-block" alt="">
                            Новости
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="Marks.html">
                            <img src="../img/Marks_icon.png" width="30" height="50" class="d-inline-block" alt="">
                            Оценки
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="AcceptRooms.php">
                            <img src="../img/Marks_icon.png" class="d-inline-block" alt="">
                            Бронирование
                        </a>
                    </li>
                    <li class="nav-item position-absolute bottom-0">
                        <a class="navbar-brand" href="Autorization.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="50" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                            </svg>
                            Выйти
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
        <input type="search" id="searchbar" onkeyup="searchRooms()" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <a href="#" style="text-decoration: none" id="liveToastBtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </a>
        </span>

    </div><br>

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="../img/Audience_icon.png" class="rounded me-2" alt="..." style="width: 50px;">
                <strong class="me-auto">Броинрование</strong>
                <small>1 минуту назад</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Новое бронирование аудитории
            </div>
        </div>
    </div>

    <div class="group">

        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ffffff; color: black">
                Сортировать
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" onclick="sortByName()">Сортировать названию</a></li>
                <li><a class="dropdown-item" href="#" onclick="sortByAvailability()">Сортировать по занятости</a></li>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление аудитории</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Название</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Описание</label>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Выбрать тип аудитории</option>
                        <option value="1">Лекционная</option>
                        <option value="2">Практическая</option>
                        <option value="3">Лабараторная</option>
                    </select>
                    <label for="customRange1" class="form-label mb-3">Количество мест</label>
                    <input type="range" class="form-range" id="customRange1" min="1" max="100" step="0.5">
                    <label for="customRange1" class="form-label mb-3">Количество компьютеров</label>
                    <input type="range" class="form-range" id="customRange2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" >
                        <label class="form-check-label">Наличие компьютеров</label>

                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label">Наличие интерактивной доски</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label">Наличие проектора</label>
                    </div>
                    <div class="mb-3" style="padding-top: 15px">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mx-auto">Добавить</button>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($locationNumbers as $item) {
    ?>
    <div class="modal fade" id="exampleModal<?php echo $item; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление аудитории</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" value="<?php echo $item ?>" placeholder="name@example.com">
                        <label for="floatingInput">Название</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Описание</label>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Выбрать тип аудитории</option>
                        <option value="1">Лекционная</option>
                        <option value="2">Практическая</option>
                        <option value="3">Лабараторная</option>
                    </select>
                    <label for="customRange1" class="form-label mb-3">Количество мест</label>
                    <input type="range" class="form-range" id="customRange1" min="1" max="100" step="0.5">
                    <label for="customRange1" class="form-label mb-3">Количество компьютеров</label>
                    <input type="range" class="form-range" id="customRange2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" >
                        <label class="form-check-label">Наличие компьютеров</label>

                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label">Наличие интерактивной доски</label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label">Наличие проектора</label>
                    </div>
                    <div class="mb-3" style="padding-top: 15px">
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary mx-auto">Добавить</button>
                </div>
            </div>
        </div>
    </div>
        <?php
    }
    ?>

    <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
        <?php foreach ($locationNumbers as $item) {
            ?>
            <div class="col" id="location-<?php echo $item; ?>">
                <div class="card">
                    <img src="../img/aud.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo "Аудитория №" . $item . "<br>"; ?></h5>
                        <p class="card-text">Статус: Свободно</p>
                        <button type="button" class="btn btn-primary btn-lg" data-bs-target="#exampleModal<?php echo $item; ?>" data-bs-toggle="modal">Подробнее</button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <br>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
                <a class="page-link">Страницы:</a>
            </li>
            <?php

            // Генерация элементов пагинации
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            for ($i = 1; $i <= 7; $i++) {
                // Текущая страница (ваша логика для получения текущей страницы)
                $active_class = ($i == $current_page) ? "active" : ""; // Проверка, является ли $i текущей страницей
                ?>
                <li class="page-item <?php echo $active_class; ?>">
                    <a class="page-link" href="http://localhost:8888/RUT/html/Rooms.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php
            }
            ?>
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
<script src="../js/Rooms.js"></script>
</body>
</html>
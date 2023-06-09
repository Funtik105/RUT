<?php

$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

$jsonData = file_get_contents("http://109.120.181.142/api/users?page=". $current_page);

// Декодирование JSON-данных в ассоциативный массив
$data = json_decode($jsonData, true);

$locationNumbers = array_column($data['hydra:member'], 'locationNumber');

$total_pages = $data['hydra:member'];
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/Users.css">
    <link rel="stylesheet" href="../css/sidebar.css">
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
                        <a class="navbar-brand" href="Timetable.php">
                            <img src="../img/Timetable_icon.png" class="d-inline-block" alt="">
                            Рассписание
                        </a>
                    </li>
                    <li class="nav-item" style="background-color: #0a53be;">
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
                <li><a class="dropdown-item" href="#">Сортировать по ID</a></li>
                <li><a class="dropdown-item" href="#">Сортировать по ФИО</a></li>
                <li><a class="dropdown-item" href="#">Сортировать по группе</a></li>
                <li><a class="dropdown-item" href="#">Сортировать по табельному номеру</a></li>
            </ul>

            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Добавить
            </button>

        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Добавление пользвателя</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">ФИО</label>
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Выбрать группу</option>
                        <option value="1">УВП-111</option>
                        <option value="2">УВП-112</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                        <option value="3">УВП-211</option>
                    </select>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput2" placeholder="name@example.com">
                        <label for="floatingInput">Табельный номер</label>
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

    <div class="create-table">
        <table class="table table-hover-sm align-middle">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ФИО</th>
                <th scope="col">Группа</th>
                <th scope="col">Табельный номер</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data['hydra:member'] as $index => $item) {
                $idString = $item['@id']; // Получение строки "@id"
                $startPosition = strrpos($idString, '/') + 1;
                $id = substr($idString, $startPosition); // Извлечение номера id

                $firstName = $item['firstName']; // Получение имени пользователя
                $lastName = $item['lastName']; // Получение фамилии пользователя
                $middleName = $item['middleName']; // Получение отчества пользователя

                // Соединение имени, фамилии и отчества пользователя
                $fullName = $lastName . ' ' . $firstName . ' ' . $middleName;
                ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td>
                        <img src="../img/gotod.jpg" class="img-thumbnail" alt="...">
                        <a href="#">
                            <?php echo $fullName; ?>
                        </a>
                    </td>
                    <td>УВП-211</td>
                    <td>8390483</td>
                    <td>
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-justify" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Изменить информацию</a></li>
                                <li><a class="dropdown-item" href="#">Удалить</a></li>
                            </ul>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

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
                <a class="page-link" href="http://localhost:8888/RUT/html/Users.php?page=1">1</a>
            </li>
            <?php

            for ($i = $start_page; $i <= $end_page; $i++) {
                if ($i == 1) {
                    continue; // Пропуск первой страницы, так как она уже отображена
                }

                $active_class = ($i == $current_page) ? "active" : "";
                ?>
                <li class="page-item <?php echo $active_class; ?>">
                    <a class="page-link" href="http://localhost:8888/RUT/html/Users.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
                <?php
            }

            // Определение ссылки для кнопки "Следующая"
            $next_page = $current_page + 1;
            $next_page_url = "http://localhost:8888/RUT/html/Users.php?page=" . $next_page;
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
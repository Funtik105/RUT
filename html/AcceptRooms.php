<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>AcceptRooms</title>
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/sidebar.css">
    <link rel="stylesheet" href="../css/AcceptRooms.css">
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
                    <li class="nav-item" style="background-color: #0a53be;">
                        <a class="navbar-brand" href="Marks.html">
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
        <input type="search" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" />
        <span class="input-group-text border-0" id="search-addon">
            <a href="#" style="text-decoration: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </a>
        </span>

    </div><br>

    <div class="create-table">
        <table class="table table-hover-sm align-middle">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">ФИО</th>
                <th scope="col">Группа</th>
                <th scope="col">Аудитория</th>
                <th scope="col">Срок</th>
                <th scope="col">Пара</th>
                <th scope="col">Подтверждение</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>
                    <img src="../img/gotod.jpg" class="img-thumbnail" alt="...">
                    <a href="#">
                        Городников Александр Игорьевич
                    </a>
                </td>
                <td>УВП-211</td>
                <td>Аудитория №1318</td>
                <td>10.10.2023</td>
                <td>3 пара</td>
                <td>
                    <button type="button" class="btn btn-primary btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">Подтведить</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">Отклонить</button>
                </td>
                <td>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Подтверждение бронирования</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите подтвердить бронирование аудитории №...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn1">Подтвердить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Отклонение бронирования</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Вы точно хотите отклонить бронирование аудитории №...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary btn1">Подтвердить</button>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>

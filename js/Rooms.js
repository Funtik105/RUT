// JavaScript code
function searchRooms() {
    var input = document.getElementById("searchbar").value.toLowerCase();
    var cards = document.getElementsByClassName("col");

    for (var i = 0; i < cards.length; i++) {
        var cardTitle = cards[i].querySelector(".card-title").textContent.toLowerCase();

        if (cardTitle.includes(input)) {
            cards[i].style.display = "block";
        } else {
            cards[i].style.display = "none";
        }
    }
}

// Сортировка по названию
function sortByName() {
    var cardsContainer = document.querySelector(".row-cols-1"); // Контейнер с карточками
    var cards = Array.from(cardsContainer.getElementsByClassName("col")); // Массив карточек

    cards.sort(function(a, b) {
        var locationNumberA = parseInt(a.id.split("-")[1]);
        var locationNumberB = parseInt(b.id.split("-")[1]);

        // Сравнение по номеру аудитории (названию)
        if (locationNumberA < locationNumberB) {
            return -1;
        } else if (locationNumberA > locationNumberB) {
            return 1;
        } else {
            return 0;
        }
    });

    // Перемещение карточек в новом порядке
    for (var i = 0; i < cards.length; i++) {
        cardsContainer.appendChild(cards[i]);
    }
}

// Сортировка по занятости
function sortByAvailability() {
    var cardsContainer = document.querySelector(".row-cols-1"); // Контейнер с карточками
    var cards = Array.from(cardsContainer.getElementsByClassName("col")); // Массив карточек

    cards.sort(function(a, b) {
        var locationNumberA = parseInt(a.id.split("-")[1]);
        var locationNumberB = parseInt(b.id.split("-")[1]);

        // Ваша логика для сравнения по занятости (по статусу)

        // Пример: сортировка по статусу "Свободно" или "Занято"
        var statusA = a.querySelector(".card-text").textContent.trim();
        var statusB = b.querySelector(".card-text").textContent.trim();

        if (statusA === "Свободно" && statusB === "Занято") {
            return -1;
        } else if (statusA === "Занято" && statusB === "Свободно") {
            return 1;
        } else {
            return 0;
        }
    });

    // Перемещение карточек в новом порядке
    for (var i = 0; i < cards.length; i++) {
        cardsContainer.appendChild(cards[i]);
    }
}
const toastTrigger = document.getElementById('liveToastBtn')
const toastLiveExample = document.getElementById('liveToast')

if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
    })
}
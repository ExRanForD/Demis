$(document).ready(function() {
    $('#contactForm').on('submit', function(event) {
        event.preventDefault(); // Предотвращение обновления страницы

        // Сброс подсветки ошибок перед новой проверкой
        $('.contact-input').removeClass('error');

        $.ajax({
            url: '/database/form.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                if (data.success) {
                    alert('Форма успешно отправлена! Ниже будет выведена информация о данных в таблице.');
                    displayTable(data.contacts);
                } else {
                    alert('Ошибка: ' + data.error);
                    highlightErrors(data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Ошибка:', textStatus, errorThrown);
            }
        });
    });

    function displayTable(contacts) {
        let table = '<table border="1"><tr><th>ФИО</th><th>Адрес</th><th>Телефон</th><th>E-mail</th></tr>';
        contacts.forEach(contact => {
            table += `<tr>
                        <td>${contact.name}</td>
                        <td>${contact.address}</td>
                        <td>${contact.phone}</td>
                        <td>${contact.email}</td>
                     </tr>`;
        });
        table += '</table>';
        $('#responseTable').html(table); // Вставка таблицы в html
    }

    function highlightErrors(errorMessage) {
        // Проверка сообщений об ошибке и подсвечивание соответствующих полей
        if (errorMessage.includes('Все поля обязательны')) {
            $('#contactForm .contact-input').each(function() {
                if (!$(this).val()) {
                    $(this).addClass('error');
                }
            });
        } else if (errorMessage.includes('Некорректный формат E-mail')) {
            $('#email').addClass('error');
        } else if (errorMessage.includes('Некорректный формат телефона')) {
            $('#phone').addClass('error');
        }
    }
});
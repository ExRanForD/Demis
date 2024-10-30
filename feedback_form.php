<?php
include "header.php";
?>

    <div class="contact-form-container">
        <form id="contactForm" class="contact-form" method="post" action="/database/form.php">
            <h2>ФОРМА ОБРАТНОЙ СВЯЗИ</h2>
            <div class="contact-form-group">
                <label for="name">ФИО:</label>
                <input type="text" id="name" name="name" class="contact-input" required>
            </div>
            <div class="contact-form-group">
                <label for="address">Адрес:</label>
                <input type="text" id="address" name="address" class="contact-input" required>
            </div>
            <div class="contact-form-group">
                <label for="phone">Телефон:</label>
                <input type="tel" id="phone" name="phone" class="contact-input" required>
            </div>
            <div class="contact-form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="contact-input" required>
            </div>
            <button type="submit" class="contact-button">Отправить</button>
        </form>
    </div>
    <div id="responseTable" class="response-table-container"></div>

<?php
include "footer.php";
?>
# test-website
test php website for intership

Це мій перший веб-сайт написаний на мові phр.

ЗАГАЛЬНИЙ ОПИС САЙТУ
При написанні використовував процедурний стиль, але вже працюю над вивченням основ ООП.
Тут реалізована система реєстрації і входу/виходу корустувачів - файл login.php. Обробка введеної користувачем інформації здійснюється файлами в папці includes.
Після реєстрації і логіну в систему з'являється сторінка користувача, на якій він може завантажити своє фото, а також фонове фото. Після завантаження з'являється можливість видалити ці фото.
Також на сторінці твіттер є можливість залишати повідомлення/пости. Також реалізований пошук по всіх повідомленнях щоб можна було знайти потрібне.

опис по файлах:
 index.php - основна сторінка з РНР-коду містить тільки перевірку чи користувач зайшов на сайт чи ні.

login.php - сторінка для входу на сайт, якщо користуващ ще не зареєстрований є посилання на сторінку для реєстрації - signup.php
 З РНР коду на цих сторінках лише управління помилками яке здійснюється через Url.
 
Обробка введенної користувачем інформації здійснюється в папці includes:
 - dbh.inc.php - під'єднання до бази данних.
 - functions.inc.php - функції які використовуються на сайті, подекуди з описом.
 - login.inc.php - обробка введеної інформації - перевірка чи користувач є, чи правильний пароль і т.д.
 - logout.inc.php - вихід користувача з системи, закривання сесії.
 - singup.inc.php - реєстрація нового користувача в базу данних
 - twitter.inc.php - додавання нового твіта
 
twitter.php - на цій сторінці можна створювати нові а також переглядати старі твіти які уже є в базі данних.

search.inc.php - сторінка яка відповідає за пошук серед усіх твітів по ключових словах. Також виводить всі знайдені результати у вигляді посиланнь. Посилання переводить на сторінку twitt_page.php на якій показується суто один шуканий твіт.

profile.php - сторінка яка відповідає за показ профайлу користувача

Може щось забув і може щось не так працює як треба і швидше за все тут далеко не клін код, тому дуже перепрошую за всі косяки.

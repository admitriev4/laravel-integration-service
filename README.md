<h1>Мультиинтеграционный сервис</h1>
<h2>Запуск приложения</h2>
<p>Для запуска приложения нужно запустить следующие команды: </p>
<p>для того что бы запустить сборку docker-compose</p>
<code>docker-compose up -d --build</code><br>
<p>Накатываем миграции</p>
<code>php artisan migrate</code>
<p>Для работы приложения нужен localtunnel. Команда для глобальной установки localtunnel </p>
<code>npm install -g localtunnel</code><br>
<p>Для того что бы использовать localtunnel выполните команду. Команда вернет ссылку на приложение</p>
<code>lt --port 8000</code>



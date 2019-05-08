Источник [https://habr.com/post/350886/](https://habr.com/post/350886/).

Структура проекта:

--dist - папка, в которую собирается проект
--src - папка с исходниками
    -favicon - иконки сайта
    -fonts - шрифты
    -html - заготовки html-страниц
        -includes - встариваемые шаблоны(footer, header, components, etc)
        -views - страницы
    -img - общие изображения(лого, bg, etc)
    -js - javascript файлы
    -scss - scss файлы
    -uploads - изображния статей
--package.json - файл настроек Node.js
--webpack.config.js - файл настроек Webpack

Команды:

npm run i - загрузка/обновление пакетов
npm run dev - сборка проекта без оптимизации
npm run build - итоговая сборка с оптимизацией
npm run start - запуск локального сервера (localgos://8080) со слежением за изменнеиями файлов

При создании новых html - файлов необходимо пересобирать проект заново командой nзm run build

Установленные пакеты:

1. babel
2. bootstrap
3. slick-slider
4. postcss(autoprefix, cssnano)
5. sass(scss)
6. jquery
7. jquery-ui

Новые пакеты устанавливать

1. npm -i *название* --save-dev - пакеты необходмые для сборки
2. nom -i *название* --save - библиотеки/фреймворки
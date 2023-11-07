/opt/php80/bin/php -f /usr/local/bin/composer install
/opt/php80/bin/php -f /usr/local/bin/composer dump-autoload

USE NVM

`nvm install v16.14.2`

`export NVM_DIR="$([ -z "${XDG_CONFIG_HOME-}" ] && printf %s "${HOME}/.nvm" || printf %s "${XDG_CONFIG_HOME}/nvm")"`

`[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"`

`source ~/.bashrc`

`nvm use 16.14.2` 

`npm run build`

**V2**
- [+] в аудио пплаере сделать панель с кнопками липкой, что бы не уходила при скроле большого списка
- [+] добавить возможность скачивания аудио уроков
- [+] добовить в меню пункт вернуться в старый кабинет
- [+] добавить видио для курса (создать плеер)
- [+] в аудио плеере показывать только mp3
- [+] обновить карточку Ваш профиль на главной
- [+] добавить поддержку аудио для дополнительных материалов
- [+] сортировка уроков по дате отправления (CB.ITEM_ID)

**V3**
- [+] прокачать аудио плер (перемотка, звук, переход на следующую дорожку, время восроизведения, мобильная верстка)
- [+] добавить поддержку дополнительных материалов с названием ДМ <ХХХ> 1, например ДМ ПОЛ 1
- [+] ДМ 1 и ДМ ПОЛ 1 - должны ссылаться на одну папку ДМ 1
- [+] Добавить историю платежей, произведенных с сайта
- [+] форма платежа не заполняется при переходе через вкладку, после F5 заполняется

**V4**
- [+] Добавить просмотр PDF уроков
- [+] Если плеер запушен и открывается новый аудио урок останавливать воспроизвередение
- [+] Выводить имена клиентов кэмел кейсе
- [+] Исправить кнопку скачки на странице Список уроков
- [+] Обработка ошибок на форме входа
- [+] Исправление CSS

**V5**
- Добавить пагинацию для истории платежей "Сайта"
- Сменить названия курсов и уроков на более читаемые

# LIBS
- Node.js 16.14.2

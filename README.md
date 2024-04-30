# Запуск через сервер
``` Достаточно просто перенести данные на сервер и поменять данные в .env ```

```

# База данных
HOST = 'localhost'
USER = 'root'
PASSWORD = ''
BASENAME = 'test'
PORT = '3306'

# Chached
CACHED_FOLDER = 'public/cached/'

# SETTINGS
COUNT_NEWS_IN_PAGE = 3
COUNT_COMMENT_IN_PAGE = 3

```

# Запуск докер
```
# База данных
HOST = 'mysql'
USER = 'admin'
PASSWORD = 'admin'
BASENAME = 'admin'
PORT = '3306'

# Chached
CACHED_FOLDER = 'public/cached/'

# SETTINGS
COUNT_NEWS_IN_PAGE = 3
COUNT_COMMENT_IN_PAGE = 3

```
``` Меняем данные в .evn под себя и пишем ```
``` docker-compose up ```

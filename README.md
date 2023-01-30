
## Laravel Admin

<br>

## Развертывание локально:

#### Клонируем проект на локальную машину и создаем .env файл на основе .env.example

```code
    git clone https://github.com/NurikN999/laravel-admin.git
    cp .env.example .env
```

#### Переносим данные в раздел с бд:
```code
    DB_CONNECTION=mysql
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=admin
    DB_USERNAME=root
    DB_PASSWORD=Nuriknurik1228337!
```

#### Запускаем build и стартуем контейнеры
```code
    docker-compose build
    docker-compose up
```

#### Устанавливаем зависимости composer
```code
    docker-compose exec backend sh 
    composer install
```

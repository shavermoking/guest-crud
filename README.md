# guest-crud

# installation
1. cp .env.example .env (до поднятия контейнеров нужно заполнить поле DB_PASSWORD. APP_PORT по умолчанию 81, можно сменить на свой)
1. composer i
2. sail up -d
3. sail artisan guest:install
4. (По надобности, создаст 10 пользователей) sail artisan db:seed


## Endpoints

Все роуты имеют префикс /api. Пример: localhost:8080/api/guests

### 1. Создать гостя
- **URL**: `/guest`
- **Method**: `POST`
- **Description**: Создает нового гостя.
- **Request Body**:
    ```json
    {
        "name": "required|string",
        "surname": "required|string",
        "mail": "required|string",
        "phone": "required|string",
        "country": "string"
    }
    ```
- **Response**:
    - **201 Created**:
    ```json
    {
        "id": "integer",
        "name": "string",
        "email": "string",
        "phone": "string",
        "country": "string"
    }
    ```
    - **400 Bad Request**: Ошибка валидации данных.

### 2. Получить всех гостей
- **URL**: `/guests`
- **Method**: `GET`
- **Description**: Получает список всех гостей.
- **Response**:
    - **200 OK**:
    ```json
    [
        {
           "name": "string",
           "surname": "string",
           "mail": "string",
           "phone": "string",
           "country": "string"
        },
        ...
    ]
    ```

### 3. Получить гостя по ID
- **URL**: `/guest/{id}`
- **Method**: `GET`
- **Description**: Получает информацию о конкретном госте по его ID.
- **Response**:
    - **200 OK**:
    ```json
    {
        "id": "integer",
        "name": "string",
        "surname": "string",
        "mail": "string",
        "phone": "string"
        "country": "string"
    }
    ```
    - **404 Not Found**: Гость не найден.

### 4. Обновить гостя
- **URL**: `/guest/{id}`
- **Method**: `PUT`
- **Description**: Обновляет информацию о конкретном госте. Можно отправить одну строку или сразу все
- **Request Body**:
    ```json
    {
        "name": "string",
        "surname": "string",
        "mail": "string",
        "phone": "string",
        "country": "string"
    }
    ```
- **Response**:
    - **200 OK**:
    ```json
    {
        "id": "integer",
        "name": "string",
        "surname": "string",
        "mail": "string",
        "phone": "string",
        "country": "string"
    }
    ```
    - **404 Not Found**: Гость не найден.

### 5. Delete Guest
- **URL**: `/guests/{id}`
- **Method**: `DELETE`
- **Description**: Удаляет гостя по его ID.
- **Response**:
    - **200 Ok**: Успешное удаление.
    - **404 Not Found**: Гость не найден.

# API de Tarefas

Uma API de gerenciamento de tarefas.

## Requisitos

- PHP >= 8.0
- Composer
- MySQL ou outro banco de dados compatível
- Laravel >= 8.0

## Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/carloseduardoalvesviana/tasks-api
    cd tasks-api
    ```

2. Instale as dependências:

    ```bash
    composer install
    ```

3. Copie o arquivo `.env.example` para `.env` e configure as informações do banco de dados:

    ```bash
    cp .env.example .env
    ```

4. Gere a chave da aplicação:

    ```bash
    php artisan key:generate
    ```

5. Execute as migrações do banco de dados:

    ```bash
    php artisan migrate
    ```

6. Execute os seeders para popular o banco com as categorias:

    ```bash
    php artisan db:seed
    ```

## Uso

Inicie o servidor de desenvolvimento:

```bash
php artisan serve

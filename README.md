# Task API - Laravel

Uma API RESTful completa construída com Laravel para gerenciar tarefas. Esta API permite realizar operações de CRUD (Criar, Ler, Atualizar, Excluir) em tarefas, tornando-se um backend prático para aplicações de gerenciamento de tarefas.

## Funcionalidades

- Criar, visualizar, atualizar e deletar tarefas
- Validar entradas para garantir integridade de dados
- Testes automatizados para assegurar a confiabilidade da API
- Configuração simples baseada em SQLite para testes

## Requisitos

- PHP >= 8.0
- Composer
- MySQL ou SQLite (para testes)

## Primeiros Passos

### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/yourusername/task-api.git
cd task-api
```

### Passo 2: Instalar Dependências

```bash
composer install
```

### Passo 3: Configurar Variáveis de Ambiente

Duplique o arquivo `.env.example` e renomeie-o para `.env`. Atualize as seguintes linhas com a configuração do seu banco de dados:

```plaintext
DB_DATABASE=task_api
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Passo 4: Executar Migrações

Configure a tabela `tasks` executando as migrações:

```bash
php artisan migrate
```

### Passo 5: Iniciar a Aplicação

Inicie o servidor de desenvolvimento do Laravel:

```bash
php artisan serve
```

A API estará acessível em `http://127.0.0.1:8000`.

## Endpoints da API

### Listar Todas as Tarefas

```http
GET /api/tasks
```

### Criar uma Nova Tarefa

```http
POST /api/tasks
Content-Type: application/json
```

Corpo da Requisição:

```json
{
  "title": "Estudar Laravel",
  "description": "Completar o tutorial de Laravel",
  "completed": false
}
```

### Exibir uma Tarefa Específica

```http
GET /api/tasks/{id}
```

### Atualizar uma Tarefa

```http
PUT /api/tasks/{id}
Content-Type: application/json
```

Corpo da Requisição:

```json
{
  "title": "Estudar Laravel e Docker",
  "description": "Estamos estudando!",
  "completed": true
}
```

### Excluir uma Tarefa

```http
DELETE /api/tasks/{id}
```

## Testes

Para rodar os testes, use o comando:

```bash
php artisan test
```

## Ferramentas

- [Laravel](https://laravel.com/) - Framework PHP para Artesãos da Web
- [REST Client](https://marketplace.visualstudio.com/items?itemName=humao.rest-client) - Extensão do VS Code para testar endpoints
- [Insomnia](https://insomnia.rest/) ou [Postman](https://www.postman.com/) - Ferramentas de teste de API

## Licença

Este projeto é licenciado sob a Licença MIT.

## Autor

Criado por [carloseduardoalvesviana](https://github.com/carloseduardoalvesviana)

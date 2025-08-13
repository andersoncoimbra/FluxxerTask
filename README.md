# FluxxerTask

Um sistema de gerenciamento de tarefas desenvolvido com Laravel (API) e Vue.js (Frontend), utilizando Docker para facilitar o desenvolvimento e deploy.

## 🚀 Tecnologias

### Backend (API)
- **Laravel 12** - Framework PHP
- **PHP 8.2** - Linguagem de programação
- **PostgreSQL 13** - Banco de dados
- **Redis 6** - Cache e filas
- **Laravel Horizon** - Monitoramento de filas
- **Laravel Sanctum** - Autenticação API

### Frontend
- **Vue.js 3** - Framework JavaScript
- **Axios** - Cliente HTTP
- **Vue CLI 5** - Ferramentas de build
- **Nginx** - Servidor web (produção)

### DevOps
- **Docker** - Containerização
- **Docker Compose** - Orquestração de containers

## 📋 Funcionalidades

- ✅ Gerenciamento de tarefas (CRUD)
- ✅ Status de tarefas: Pendente, Em Processamento, Concluída
- ✅ API RESTful
- ✅ Interface responsiva
- ✅ Sistema de filas para processamento assíncrono
- ✅ Containerização completa

## 🛠️ Pré-requisitos

- Docker
- Docker Compose
- Git

## 📦 Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/andersoncoimbra/FluxxerTask
cd FluxxerTask
```

2. **Execute o projeto com Docker Compose**
```bash
docker-compose up -d
```

3. **Aguarde a inicialização**
O comando acima irá:
- Construir as imagens Docker
- Configurar o banco de dados PostgreSQL
- Instalar dependências do Laravel
- Gerar chave da aplicação
- Executar migrations
- Inicializar o Redis
- Construir e servir o frontend

## 🌐 Acesso

- **Frontend**: http://localhost
- **API**: http://localhost:8000
- **Banco de dados**: localhost:5432

### Credenciais do Banco de Dados
- **Database**: fluxxer_test
- **Username**: fluxxer_user
- **Password**: fluxxer_password

## 📚 Estrutura do Projeto

```
FluxxerTask/
├── api/                    # Backend Laravel
│   ├── app/
│   │   ├── Http/
│   │   │   └── Controllers/
│   │   ├── Models/
│   │   │   ├── Task.php
│   │   │   └── User.php
│   │   └── Enums/
│   │       └── TaskStatus.php
│   ├── database/
│   │   └── migrations/
│   ├── routes/
│   └── ...
├── front/                  # Frontend Vue.js
│   ├── src/
│   ├── public/
│   ├── Dockerfile
│   └── nginx.conf
└── docker-compose.yml
```

## 🔧 Desenvolvimento

### Comandos Úteis

**Executar migrações**
```bash
docker-compose exec api php artisan migrate
```

**Executar seeders**
```bash
docker-compose exec api php artisan db:seed
```




**Reconstruir imagens**
```bash
docker-compose down
docker-compose up --build -d
```

### Status das Tarefas

O sistema utiliza um enum para gerenciar os status das tarefas:

- `PENDING` - Pendente
- `PROCESSING` - Em Processamento  
- `DONE` - Concluída



## 📖 API Endpoints

A API segue os padrões RESTful. Principais endpoints:

```
GET    /api/tasks      # Listar tarefas
POST   /api/tasks      # Criar tarefa

```

## 🔍 Monitoramento

O Laravel Horizon está configurado para monitoramento de filas:
- Acesse: http://localhost:8000/horizon





## 🚀 Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias:

- PHP 8.3
- Laravel 11
- MySQL 8.0

## 💻 Projeto
Gestão de livros

## Documentação
- [Documentação da API](https://documenter.getpostman.com/view/16008943/2sA3Bj8E7H#d15755d7-b153-436a-a416-e00ebb257b83)

## 🚀 Como executar
- Clone o repositório `git clone https://github.com/Sidneyasjr/book_manager.git`
- Instale as dependências com `composer install`
- Copie o arquivo `.env.example` e crie um arquivo `.env` com as credenciais do seu banco de dados
- Gere a chave da aplicação com `php artisan key:generate`
- Execute as migrations com `php artisan migrate`
- Gere a chave JWT com `php artisan jwt:secret`

## 🚀  Como executar os testes
- Copie o arquivo `.env.testing.example` e crie um arquivo `.env.testing` com as credenciais do seu banco de dados
- Copie o APP_KEY do arquivo `.env` para o arquivo `.env.testing`
- Copie JWT_SECRET do arquivo `.env` para o arquivo `.env.testing`
- Crie um banco de dados de teste
- Execute os testes com `php artisan test`

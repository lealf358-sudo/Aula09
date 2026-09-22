# API de Livros

## Sobre o projeto

Este projeto foi desenvolvido como atividade da unidade curricular **Desenvolver Serviços Web**.

A ideia foi criar uma API simples para trabalhar com livros, permitindo consultar, cadastrar, atualizar e excluir informações. Para desenvolver a API, utilizei **PHP com o framework Slim**, além do Composer e do Postman para fazer os testes.

## Informações

**Curso:** Desenvolver Serviços Web

**Unidade Curricular:** Desenvolver Serviços Web

**Aluno:** Francisco Bandel Leal

## Tecnologias utilizadas

* PHP
* Slim Framework
* Composer
* JSON
* Postman
* Git e GitHub

## Como a API funciona

A API trabalha com o recurso **livros** e possui quatro operações principais: consultar, cadastrar, atualizar e excluir.

### GET /livros

Mostra todos os livros cadastrados.

```text
GET http://localhost:8081/livros
```

### GET /livros/{id}

Mostra um livro específico usando o seu ID.

```text
GET http://localhost:8081/livros/1
```

Se o livro não existir, a API retorna `404`.

### POST /livros

Adiciona um novo livro.

```text
POST http://localhost:8081/livros
```

No Body do Postman, usando JSON:

```json
{
    "titulo": "O Senhor dos Anéis",
    "autor": "J. R. R. Tolkien",
    "ano": 1954
}
```

Quando o cadastro é realizado, a API retorna o novo livro com seu ID e o status `201`.

### PUT /livros/{id}

Atualiza as informações de um livro que já existe.

```text
PUT http://localhost:8081/livros/1
```

Exemplo de Body:

```json
{
    "titulo": "Harry Potter Atualizado",
    "autor": "J. K. Rowling",
    "ano": 2000
}
```

Se o livro existir, ele é atualizado e a API retorna o livro modificado com status `200`.

### DELETE /livros/{id}

Exclui um livro pelo ID.

```text
DELETE http://localhost:8081/livros/1
```

Quando o livro é excluído corretamente, a API retorna `204 No Content`.

Se o livro não for encontrado, retorna `404`.

## Como executar o projeto

Primeiro, é necessário instalar as dependências do projeto:

```bash
composer install
```

Depois, dentro da pasta do projeto, o servidor pode ser iniciado com:

```bash
php -S localhost:8081 -t public public/index.php
```

Com o servidor funcionando, os endpoints podem ser testados pelo **Postman**.

A URL base utilizada nos testes é:

```text
http://localhost:8081
```

## Endpoints disponíveis

| Método | Endpoint       | O que faz                  |
| ------ | -------------- | -------------------------- |
| GET    | `/livros`      | Mostra todos os livros     |
| GET    | `/livros/{id}` | Mostra um livro específico |
| POST   | `/livros`      | Adiciona um novo livro     |
| PUT    | `/livros/{id}` | Atualiza um livro          |
| DELETE | `/livros/{id}` | Exclui um livro            |

## Observação

Neste projeto, os livros ficam armazenados em um array dentro do próprio código PHP. Por isso, as alterações feitas com POST, PUT e DELETE não ficam salvas permanentemente. Quando o servidor é reiniciado, a lista volta para os livros que foram definidos inicialmente no código.

## Conclusão

Com esta atividade, foi possível praticar a criação de uma API utilizando os principais métodos HTTP: **GET, POST, PUT e DELETE**. Também foi possível testar as requisições utilizando o Postman e organizar o projeto para ser disponibilizado no GitHub.

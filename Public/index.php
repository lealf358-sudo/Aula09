<?php

require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);


// ARRAY DE LIVROS
$livros = [
    [
        'id' => 1,
        'titulo' => 'Harry Potter e a Pedra Filosofal',
        'autor' => 'J. K. Rowling',
        'ano' => 1997
    ],
    [
        'id' => 2,
        'titulo' => 'O Hobbit',
        'autor' => 'J. R. R. Tolkien',
        'ano' => 1937
    ]
];


// GET /livros
$app->get('/livros', function ($request, $response) use ($livros) {

    $response->getBody()->write(json_encode($livros));

    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
});

// GET /livros/{id}
$app->get('/livros/{id}', function ($request, $response, $args) use ($livros) {

    $id = (int) $args['id'];

    foreach ($livros as $livro) {

        if ($livro['id'] == $id) {

            $response->getBody()->write(json_encode($livro));

            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    }

    $erro = [
        'erro' => 'Livro não encontrado'
    ];

    $response->getBody()->write(json_encode($erro));

    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(404);
});

// POST /livros
$app->post('/livros', function ($request, $response) use (&$livros) {

    $dados = $request->getParsedBody();

    $novoLivro = [
        'id' => count($livros) + 1,
        'titulo' => $dados['titulo'],
        'autor' => $dados['autor'],
        'ano' => $dados['ano']
    ];

    $livros[] = $novoLivro;

    $response->getBody()->write(json_encode($novoLivro));

    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});

$app->run();

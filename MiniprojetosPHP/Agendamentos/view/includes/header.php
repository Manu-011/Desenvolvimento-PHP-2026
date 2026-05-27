<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamentos</title>
    <style>
        /* Um CSS básico apenas para não ficar tudo grudado */
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .erro { color: #d9534f; background: #fdf7f7; padding: 10px; border: 1px solid #d9534f; border-radius: 4px; }
        .sucesso { color: #5cb85c; background: #f4fdf4; padding: 10px; border: 1px solid #5cb85c; border-radius: 4px; }
        input[type="email"], input[type="password"] { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background-color: #0275d8; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; }
        button:hover { background-color: #025aa5; }
    </style>
</head>
<body>
    <div class="container">
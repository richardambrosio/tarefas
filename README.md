# Gerenciador de Tarefas

Esse é um projeto contido no livro da Casa do código "Desenvolvimento web com PHP e MySql" - Edição Atualizada, do Evaldo Junior Bento.

Você pode encontrar o livro através do link https://www.casadocodigo.com.br/products/livro-php-mysql.

A aplicação segue os exemplos do livro, com umas mudanças pessoais para melhorar a visualização (Bootstrap 4 e FontAwesome).

----------------------------------------------------------------------


## Informações importantes

> Arquivo config/config.php

Altere as constantes 'EMAIL_NOTIFICACAO', 'EMAIL_REMETENTE' e 'SENHA_REMETENTE' para poder funcionar o envio de e-mails:

```php
define('EMAIL_NOTIFICACAO', 'Email que receberá a notificação');
define('EMAIL_REMETENTE', 'Seu email');
define('SENHA_REMETENTE', 'Sua senha');
```

Caso tenha criado banco de dados ou usuário/senha com nomes diferentes. Você pode alterá-los acima também:

```php
define('BD_USUARIO', 'sistema_tarefas');
define('BD_SENHA', 'sistema');
define('BD_DSN', 'mysql:dbname=tarefas;host=localhost');
```


> Arquivo index.php

Antes de testar o funcionamento da aplicação, altere o primeiro 'require' do arquivo.
Mude o valor de '../config.php' 

```php
require "../config.php";
```

Para 'config/config.php'.

```php
require "config/config.php";
```
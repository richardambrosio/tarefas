# Gerenciador de Tarefas

Esse é um projeto contido no livro da Casa do Código [Desenvolvimento web com PHP e MySql - Edição Atualizada](https://www.casadocodigo.com.br/products/livro-php-mysql), do Evaldo Junior Bento.

A aplicação segue os exemplos do livro, com umas mudanças pessoais para melhorar a visualização (Bootstrap 4 e FontAwesome).

Vale ressaltar que é um projeto feito apenas para estudos!!

----------------------------------------------------------------------

## Informações importantes

> Geração da base de dados

Há um script [tarefas.sql](script_sql/tarefas.sql) que faz a criação de base de dados, tabelas e relacionamentos necessários para fazer funcionar a aplicação. Esse script foi criado com a ferramenta PHPMyAdmin. Inclusive, ele cria o usuário utilizado pela aplicação:

```sql
GRANT ALL PRIVILEGES ON tarefas.* TO 'sistema_tarefas'@'localhost' IDENTIFIED BY 'sistema';
```

> Arquivo config/config.php

O arquivo [config.php](config/config.php) contém as constantes que configuram acesso ao banco de dados e envio de e-mails.

Caso tenha criado o banco de dados ou usuário/senha com nomes diferentes. Você pode alterá-los nas linhas iniciais do arquivo:

```php
define('BD_USUARIO', 'sistema_tarefas');
define('BD_SENHA', 'sistema');
define('BD_DSN', 'mysql:dbname=tarefas;host=localhost');
```

Altere as constantes `EMAIL_NOTIFICACAO`, `EMAIL_REMETENTE` e `SENHA_REMETENTE` para poder funcionar o envio de e-mails:

```php
define('EMAIL_NOTIFICACAO', 'Email que receberá a notificação');
define('EMAIL_REMETENTE', 'Seu email');
define('SENHA_REMETENTE', 'Sua senha');
```

> Arquivo index.php

Antes de testar o funcionamento da aplicação, é necessário alterar o primeiro `require` do arquivo [index.php](index.php).

Mude o valor de `../config.php` ...

```php
require "../config.php";
```

... para `config/config.php`.

```php
require "config/config.php";
```
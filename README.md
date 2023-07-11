# Google Calendar Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-@leandroferreirama-blue.svg?style=flat-square)](https://twitter.com/leandroferreirama)
[![Source Code](http://img.shields.io/badge/source-leandroferreirama/google%E2%80%9calendar-blue.svg?style=flat-square)](https://github.com/leandroferreirama/google-calendar)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/leandroferreirama/google-calendar.svg?style=flat-square)](https://packagist.org/packages/leandroferreirama/google-calendar)
[![Latest Version](https://img.shields.io/github/release/leandroferreirama/google-calendar.svg?style=flat-square)](https://github.com/leandroferreirama/google-calendar/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/leandroferreirama/google-calendar.svg?style=flat-square)](https://scrutinizer-ci.com/g/leandroferreirama/google-calendar)
[![Quality Score](https://img.shields.io/scrutinizer/g/leandroferreirama/google-calendar.svg?style=flat-square)](https://scrutinizer-ci.com/g/leandroferreirama/google-calendar)
[![Total Downloads](https://img.shields.io/packagist/dt/leandroferreirama/google-calendar.svg?style=flat-square)](https://packagist.org/packages/cleandroferreirama/google-calendar)

###### Google Calendar Library is a small set of classes developed to integrate the Google Calendar API into your system.
###### To use this library, you need to generate an authorization token in google. I developed the leandroferreirama/google-auth component that will help you in the process of generating and updating the token.For more details on token creation [click here](https://packagist.org/packages/leandroferreirama/google-auth)

Biblioteca Google Calendar é um pequeno conjunto de classes desenvolvidas para integrar o seu sistema a API do Google Calendar.
Para usar esta biblioteca, é necessário gerar um token de autorização no google. Desenvolvi o componente leandroferreirama/google-auth que te auxiliará no processo de geração e atualização do token. Para mais detalhes sobre o criação do token [clique aqui](https://packagist.org/packages/leandroferreirama/google-auth)


### Highlights

- Simple installation (Instalação simples)
- Abstraction of all API methods (Abstração de todos os métodos da API)
- Easy authentication with login and password (Fácil autenticação com login e senha)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"leandroferreirama/google-calendar": "^1.0"
```

or run

```bash
composer require leandroferreirama/google-calendar
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

### Schedule:
#### Create

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

use LeandroFerreiraMa\GoogleCalendar\Schedule;

$schedule = new Schedule(
    'ya29.****** removid for secure'
);
$create = $schedule->create(
    "Title test", 
    (new DateTime('2023-07-11 03:45:00')), 
    (new DateTime('2023-07-11 04:45:00')),
    "Description test",
    "location test",
    "primary",
    [
        "email" => "guest1@email.com",
        "email" => "guest2@email.com"
    ]
);

var_dump($create->response());

```
###### [Click here to consult the official documentation](https://developers.google.com/calendar/api/v3/reference/events/insert?hl=en)
[Clique aqui para consultar a documentação oficial](https://developers.google.com/calendar/api/v3/reference/events/insert?hl=pt-br)


#### Update

```php
<?php

require __DIR__ . "/../vendor/autoload.php";

use LeandroFerreiraMa\GoogleCalendar\Schedule;

$schedule = new Schedule(
    'ya29.****** removid for secure'
);
$update = $schedule->update(
    "eventId****",
    "Title test", 
    (new DateTime('2023-07-11 03:45:00')), 
    (new DateTime('2023-07-11 04:45:00')),
    "Description test",
    "location test",
    "primary",
    "cancelled",
    [
        "email" => "guest1@email.com",
        "email" => "guest2@email.com"
    ]
);

var_dump($update->response());
```
###### [Click here to consult the official documentation](https://developers.google.com/calendar/api/v3/reference/events/update?hl=en)
[Clique aqui para consultar a documentação oficial](https://developers.google.com/calendar/api/v3/reference/events/update?hl=pt-br)

### Others

###### You also have classes for endpoints of portfolios and signatures, all the documentation of use with practical examples is available in the examples folder library. Please check there.

Você também conta com classes para os endpoints de carteiras e assinaturas, toda documentação de uso com exemplos práticos está disponível na pasta examples desta biblioteca. Por favor, consulte lá.

## Contributing

Please see [CONTRIBUTING](https://github.com/leandroferreirama/google-calendar/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email suporte@integracaosistema.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para suporte@integracaosistema.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Leandro F. Marcelli](https://github.com/leandroferreirama) (Developer)
- [All Contributors](https://github.com/leandroferreirama/google-calendar/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/leandroferreirama/google-calendar/blob/master/LICENSE) for more information.
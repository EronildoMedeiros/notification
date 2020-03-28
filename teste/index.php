<?php

require __DIR__.'/../lib_ext/autoload.php';

use Notification\Email;

$novoEmail = new Email(
    2,
    "smtp.gmail.com",
    "email@gmail.com",
    "xxxxxxxxxx",
    "TSL",
    "587",
    "email@gmail.com",
    "nome"
);

$novoEmail->sendMail(
    "Assunto de Teste",
    "<p>Esse é um e-mail de <b>teste</b></p>",
    "email@gmail.com",
    "Nome",
    "email@gmail.com",
    "name"
);

var_dump($novoEmail);
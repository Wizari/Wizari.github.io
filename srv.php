<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $tel = strip_tags($_POST['tel']);
    $mes = strip_tags($_POST['message']);

    $res = array();

    if (empty($tel)) {
        $res['error'] = "Нужно добавить номер телефона!";
        echo json_encode($res);
        exit();
    }


    require 'vendor/autoload.php';

    $date = date('H:i:s', time());

    $message = (new Swift_Message($date))
        ->setFrom(['Fromn@gmail.com' => 'Склад']) //<-------- set
        ->setTo(['To@gmail.com' => 'A name'])     //<-------- set
        ->setBody('Имя: ' . $name .
            "\n" . 'Почта: ' . $email .
            "\n" . 'Телефон: ' . $tel .
            "\n" . 'Сообщение: ' . $mes);

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('')                          //<-------- set
        ->setPassword('');                         //<-------- set
    $mailer = new Swift_Mailer($transport);

    $result = $mailer->send($message);

    if ($result) {
        $res['success'] = '';
    }

    echo json_encode($res);

    exit();

}

exit();

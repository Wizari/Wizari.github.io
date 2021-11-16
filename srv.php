<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tel = strip_tags($_POST['tel']);

    $res = array();

    if (empty($tel)) {
        $res['error'] = "Нужно добавить номер телефона!";
        echo json_encode($res);

        exit();
    }

    require 'vendor/autoload.php';

//    $date = date('d/m H:i:s', time());
    $date = date('H:i:s', time());

//    $message = (new Swift_Message('Позвоните'))
//    $message = (new Swift_Message('Позвоните - ' . $date))
    $message = (new Swift_Message($date))
        ->setFrom(['Fromn@gmail.com' => 'Склад']) //<-------- set
        ->setTo(['To@gmail.com' => 'A name'])     //<-------- set
        ->setBody('Перезвоните мне по номеру - ' . $tel);

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

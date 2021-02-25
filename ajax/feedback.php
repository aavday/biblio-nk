<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

    $to = COption::GetOptionString('main', 'email_from');
print_r($to);

    $rsSite = CSite::GetByID(SITE_ID);
    $arSite = $rsSite->Fetch();
    $email = $arSite['EMAIL'];

    if ($email) $to = $email;

    $subject = checkValue($_POST['subject']);
    $message = $subject . ' с сайта ' . $_SERVER['HTTP_HOST'] . '<br><br>';
    $list = array();

    foreach ($_POST as $key => $value)
    {
        if (!in_array($key, array('personal', 'subject')) && $value != '')
        {
            $temp = str_replace('_', ' ', $key) . ': ' . checkValue($value);
            $message = $message . $temp . '<br>';
            $list[] = $temp;
        }
    }

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";
    // $headers .= "From: Библиотека НК <noreply@$_SERVER[HTTP_HOST]>" . "\r\n";

    mail($to, $subject, $message, $headers);

    CModule::IncludeModule('highloadblock');

    $hlblock = Bitrix\Highloadblock\HighloadBlockTable::getById(1)->fetch();
    $entity  = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();

    $fileds = array(
        'UF_NAME' => $subject,
        'UF_TEXT' => $list,
        'UF_CREATED_AT' => date('d.m.Y H:i:s')
    );

    $entity_data_class::add($fileds);

    echo true;
}
?>
<?php
namespace app\core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/**
*|-----------------------------------------------------------------
*|
*|  This file contains a parent class, this class is
*|  responsible for control and quality of connections
*|  (What the user can do)
*|
*|-----------------------------------------------------------------
**/

class Utils
{

    /**
    *|-----------------------------------------------------------------
    *|  @param function_sendMail;
    *|  Отправка почты
    *|-----------------------------------------------------------------
    **/

    static function sendMail($them, $body, $altbody, $to)
    {

        $mail = new PHPMailer(true);
        $mail->CharSet = 'utf-8';

        $mail->isSMTP();
        $mail->Host       = $_ENV["SMPT_HOST"];  																							// Specify main and backup SMTP servers
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV["SMTP_USERNAME"];
        $mail->Password   = $_ENV["SMTP_PASSWORD"];
        $mail->SMTPSecure = $_ENV["SMTP_SECURE"];
        $mail->Port       = (int) $_ENV["SMTP_PORT"];
        $mail->From       = "XNR BOTS";
    
        // Отправка
        $mail->setFrom($_ENV["SMTP_USERNAME"]);
        $mail->addAddress($to);
        $mail->Subject = $them;

        // Подключение html
        $mail->isHTML(true);
        $mail->Body = $body;
        $mail->AltBody = $altbody;

        if(!$mail->send())
            Utils::debugLog("Ошибка отправки письма - $to","SMTP.log");
        else
            Utils::debugLog("Письмо отправлено - $to","SMTP.log");
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_debugLog;
    *|  логирование
    *|-----------------------------------------------------------------
    **/

    static function debugLog($message, $fileName)
    {
        $logMessage = $message;
        $logFile = $fileName.'.txt';
        $currentDate = date('Y-m-d H:i:s');
        $logMessage = "[$currentDate] $logMessage\n";
        $fp = fopen($logFile, 'a');
        if ($fp) {
            fwrite($fp, $logMessage);
            fclose($fp);
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_stmpVarDump;
    *|  vardamp для mysql
    *|-----------------------------------------------------------------
    **/

    static function stmpVarDump($stmp, $link)
    {
        if (!$stmp) {
            var_dump(mysqli_error($link));
        }
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_getModule;
    *|  Получает модули из папки modules
    *|-----------------------------------------------------------------
    **/

    static function getTemplates($module)
    {
        return file_get_contents("public/templates/" . $module);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_sendAjaxRequest;
    *|  Конвертирует в json и выводит
    *|-----------------------------------------------------------------
    **/

    static function sendAjaxRequest($response)
    {
        header('Content-Type: application/json');
        $json_response = json_encode($response);
        echo $json_response;
        exit;
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_renderHTML;
    *|  Заносит переменные в HTML
    *|-----------------------------------------------------------------
    **/

    static function renderHTML($html, $params, $conditions = [])
    {

        foreach($params as $key => $value)
            $html = str_replace("%%$key%%", $value, $html);


        foreach ($conditions as $condition => $status) {
            if ($status) {
                $html = preg_replace("/<!-- %%ELSE_$condition%% -->.*?<!-- %%ENDIF_$condition%% -->/s", '', $html);
                $html = str_replace("<!-- %%IF_$condition%% -->", '', $html);
            } else {
                $html = preg_replace("/<!-- %%IF_$condition%% -->.*?<!-- %%ELSE_$condition%% -->/s", '', $html);
                $html = str_replace("<!-- %%ENDIF_$condition%% -->", '', $html);
            }
        }

        return $html;

    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_unPackArray;
    *|  Заносит переменные в HTML
    *|-----------------------------------------------------------------
    **/

    static function unPackArray($arr)
    {
        $count = 0;
        $new_arr = [];

        foreach($arr as $key => $value) {
            array_push($new_arr, ...[$count => $value]);
            $count++;
        }

        return $new_arr;
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_timestampIsLife;
    *|  Функция проверки вышла ли время метки timestamp
    *|-----------------------------------------------------------------
    **/

    static function timestampIsLife($timestamp)
    {
        if((int)time() <= strtotime($timestamp))
            return true;
        else return false;
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param function_days_between_dates;
    *|  Функция для вывода разницы между днями
    *|-----------------------------------------------------------------
    **/

    static function days_between_dates($timestamp1, $timestamp2) {
        $diff = $timestamp2 - $timestamp1;
        return floor($diff / (60 * 60 * 24));
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param update_ini_file;
    *|  Функция для обновления ini файлов
    *|  @param $file_path - Путь к файлу
    *|  @param $section - Имя секции
    *|  @param $key - Ключ объекта
    *|  @param $new_value - Значение объекта
    *|-----------------------------------------------------------------
    **/

    static function update_ini_file($file_path, $section, $key, $new_value) 
    {
        // Читаем существующие значения из INI-файла
        $config = parse_ini_file($file_path, true);
    
        // Обновляем значение
        $config[$section][$key] = $new_value;
    
        // Генерируем новое содержимое INI-файла
        $content = '';
        foreach ($config as $section => $values) 
        {
            $content .= "[$section]\n";
            foreach ($values as $key => $value)
            {
                $content .= "$key = \"$value\"\n";
            }
            $content .= "\n";
        }
    
        // Записываем обновленные значения обратно в файл
        file_put_contents($file_path, $content);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param RemoveDir;
    *|  Функция для удаления дерикторий
    *|  @param $dir - Путь к папке
    *|-----------------------------------------------------------------
    **/
    static function RemoveDir($folderPath) {
        if (!is_dir($folderPath)) {
            return;
        }
    
        $files = glob($folderPath . '/*');
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            } elseif (is_dir($file)) {
                Utils::RemoveDir($file);
            }
        }
    
        rmdir($folderPath);
    }

    /**
    *|-----------------------------------------------------------------
    *|  @param sendMessageTelegram;
    *|  Функция для удаления дерикторий
    *|  @param $botToken - Токен авторизации бота
    *|  @param $chatId - Индекс чата для отправки сообщения
    *|  @param $messageText - Сообщение, поддержка формата html
    *|-----------------------------------------------------------------
    **/
    static function sendMessageTelegram($botToken, $chatId, $messageText){
        $url = "https://api.telegram.org/bot$botToken/sendMessage";

        $data = array(
            'chat_id' => $chatId,
            'text' => $messageText,
            'parse_mode' => 'HTML'
        );

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_RETURNTRANSFER => true
        );

        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
<?
    if(isset($_GET['code']) && (!isset($_SESSION['used_code']) || $_SESSION['used_code'] !=  $_GET['code'])){
        $_SESSION['used_code'] = $_GET['code'];
        
        // Соберем данные для запроса
        $data = [
            'client_id' => $CLIENT_ID,
            'client_secret' => $CLIENT_SECRET,
            'grant_type' => 'authorization_code',
            'code' => $_GET['code'],
            'redirect_uri' => $CLIENT_REDIRECT_URI,
        ];
        $link = 'https://' . $SUBDOMAIN . '.amocrm.ru/oauth2/access_token';

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
        curl_setopt($curl,CURLOPT_URL, $link);
        curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
        curl_setopt($curl,CURLOPT_HEADER, false);
        curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
        $out = curl_exec($curl); 
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $code = (int)$code;
        $errors = [
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable',
        ];

        try
        {
            //Если код ответа не успешный - возвращаем сообщение об ошибке
            if ($code < 200 || $code > 204) {
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
            }
        }
        catch(\Exception $e)
        {
            die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
        }

        $response = json_decode($out, true);
        $access_token = $response['access_token']; //Access токен
        $refresh_token = $response['refresh_token']; //Refresh токен
        $token_type = $response['token_type']; //Тип токена
        $expires_in = $response['expires_in']; //Через сколько действие токена истекает 
        echo "<script>sessionStorage.setItem('access_token', '".$access_token."')</script>";
        echo "<script>sessionStorage.setItem('refresh_token', '".$refresh_token."')</script>";
    }
?>




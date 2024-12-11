<?php
    require __DIR__ .'/env.php';
    $access_token = $_POST['token'];
    // Данные для новой сделки
    $deal = [
        'name' =>  $_POST['name'],
        'price' => intval($_POST['price']),
        'custom_fields_values' => [
            0 => [
                'field_id' => 757195,
                'values' => [
                    0 => [
                        'value' => isset($_POST['time_check']),
                    ]
                ]
            ],
        ],
        '_embedded' => [
            'contacts' => [
                0 => [
                    'name' =>  $_POST['name'],
                    'custom_fields_values' => [
                        0 => [
                            'field_id' => 744341,
                            'values' => [
                                0 => [
                                    'value' => $_POST['phone'],
                                    'enum_code' => 'WORK'
                                ]
                            ]
                        ],
                        1 => [
                            'field_id' => 744343,
                            'values' => [
                                0 => [
                                    'value' => $_POST['email'],
                                    'enum_code' => 'WORK'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    // Запрос на создание новой сделки
    $url = 'https://'.$SUBDOMAIN.'.amocrm.ru/api/v4/leads/complex';

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([$deal]));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $access_token,
        'Content-Type: application/json',
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    header("Location: /"); // Замените form_page.php на имя вашего файла с формой
    exit();
?>

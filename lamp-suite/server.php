<?php

$curl = curl_init();
$POST      = $_POST;
$token    =  $POST['token'];
$headers  =  [
    "Accept: application/json, application/xml",
    "Authorization: Bearer $token",
    "Content-Type: application/json"
  ];

switch($POST['request'])
  {
    case 'address':
                    curl_setopt_array($curl, [
                      CURLOPT_URL => "https://api.batchdata.com/api/v1/address/verify",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => json_encode([
                        'requests' => [
                            [
                                    'street' => $POST['address'],
                                    'city' => $POST['city'],
                                    'state' => $POST['state'],
                                    'zip' => $POST['zip']
                            ]
                        ]
                      ]),
                      CURLOPT_HTTPHEADER => $headers,
                    ]);
    break;
    case 'phone':  
                  curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.batchdata.com/api/v1/phone/verification",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => json_encode([
                      'requests' => [
                                  $POST['phone']
                      ]
                    ]),
                    CURLOPT_HTTPHEADER => $headers,
                  ]);
    break;
    case 'property':
                        curl_setopt_array($curl, [
                          CURLOPT_URL => "https://api.batchdata.com/api/v1/property/lookup/all-attributes",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => json_encode([
                            'requests' => [
                                [
                                        'address' => [
                                                            'street' => $POST['address'],
                                                            'city' => $POST['city'],
                                                            'state' => $POST['state'],
                                                            'zip' => $POST['zip']
                                        ]
                                ]
                            ]
                          ]),
                          CURLOPT_HTTPHEADER => $headers,
                        ]);
    break;
    case 'geocode':
                        curl_setopt_array($curl, [
                          CURLOPT_URL => "https://api.batchdata.com/api/v1/address/geocode",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => json_encode([
                            'requests' => [
                                [
                                        'address' => $POST['address']
                                ]
                            ]
                          ]),
                          CURLOPT_HTTPHEADER => $headers,
                        ]);

    break;
    case 'skiptrace':
                        curl_setopt_array($curl, [
                          CURLOPT_URL => "https://api.batchdata.com/api/v1/property/skip-trace",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => json_encode([
                            'requests' => [
                                [
                                        'propertyAddress' => [
                                                            'street' => $POST['address'],
                                                            'city' => $POST['city'],
                                                            'state' => $POST['state'],
                                                            'zip' => $POST['zip']
                                        ]
                                ],
                                [
                                        'propertyAddress' => [
                                                        'street' => '25866 W Globe Ave',
                                                        'city' => 'Buckeye',
                                                        'state' => 'AZ',
                                                        'zip' => '85326'
                                        ]
                                ]
                            ]
                          ]),
                          CURLOPT_HTTPHEADER => $headers,
                        ]);
    break;
  }



$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
?>
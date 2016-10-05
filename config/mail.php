<?php
return [
'driver' => env('MAIL_DRIVER',' smtp'),
'host' => env('MAIL_HOST', 'smtp.gmail.com'),
'port' => env('MAIL_PORT', 587),
'from' => ['address' =>"MyUsername@gmail.com" , 'name' => "example"],
'encryption' => 'tls',
'username' => env('MyUsername@gmail.com'),
'password' => env('MyPassword'),
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => false,
];
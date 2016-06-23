<?php
return [
    'user' => [
        'rule' => [
            'name_max' => 50,
            'email_max' => 80,
            'password_min' => 6,
        ],
    ],
    'entry' => [
        'rule' => [
            'title_max' => 200,
            'body_min' => 250,
            'time' => "Y h:ia , M j",
        ],
    ],
]; 
<?php

return [
    'url' => [
        'gmail' => env('SHARE_GMAIL_URL', 'https://mail.google.com/mail/?view=cm&fs=1&su=Place%20Order&body='),
        'facebook' => env('SHARE_FACEBOOK_URL', 'https://www.facebook.com/sharer/sharer.php?u='),
        'messenger' => env('SHARE_MESSENGER_URL', 'fb-messenger://share/?link='),
        'linkedin' => env('SHARE_LINKEDIN_URL', 'https://www.linkedin.com/shareArticle?url='),
        'whatsapp' => env('SHARE_WHATSAPP_URL', 'https://web.whatsapp.com/send?text='),
        'instagram' => env('SHARE_INSTAGRAM_URL', 'instagram://app'),
        'sms' => env('SHARE_SMS_URL', 'mailto:?subject=Testing&body='),
    ],
];

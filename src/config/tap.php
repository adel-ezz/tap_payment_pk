<?php

return [
    'TAP_POST_URL'=>url(env('TAP_POST_URL','/pay/post')),
    'TAP_REDIRECT_URL'=>url(env('TAP_POST_URL','/pay/call_back')),
    'TAP_SECRET'=>env('TAP_SECRET','sk_test_XKokBfNWv6FIYuTMg5sLPjhJ'),

];

# tap_payment_pk
helper package to integrate with tap payment sample integration

For Testing it .
1- return [
    'TAP_POST_URL'=>env('TAP_POST_URL','/pay/post'),
    'TAP_REDIRECT_URL'=>env('TAP_POST_URL','/pay/call_back'),
    'TAP_SECRET'=>env('TAP_SECRET','sk_test_XKokBfNWv6FIYuTMg5sLPjhJ')

];
in publisied tap.php 
make vendor:publish 

2- in your browser main url /testBackage to get all process 
3- you can use test cards in this url for testing 
https://tappayments.api-docs.io/2.0/testing/test-api-keys

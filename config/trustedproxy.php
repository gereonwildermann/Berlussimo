<?php

return [

    /*
     * Set trusted proxy IP addresses.
     * Use '*' to trust all proxies, or list specific IPs/CIDR ranges.
     */
    'proxies' => [
        '',
    ],

    /*
     * Which headers to use to detect proxy data.
     * HEADER_CLIENT_* constants were removed in Laravel 9 / Symfony 5.
     */
    'headers' => \Illuminate\Http\Request::HEADER_X_FORWARDED_FOR |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_HOST |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_PORT |
                 \Illuminate\Http\Request::HEADER_X_FORWARDED_PROTO,

];

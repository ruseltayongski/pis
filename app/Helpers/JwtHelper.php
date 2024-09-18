<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtHelper
{
    public static function decode($jwt, $key)
    {
        try {
            $jwt = 'eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1laWRlbnRpZmllciI6IjEwMzEwOTIiLCJodHRwOi8vc2NoZW1hcy54bWxzb2FwLm9yZy93cy8yMDA1LzA1L2lkZW50aXR5L2NsYWltcy9uYW1lIjoiMjc2MCIsImV4cCI6MTcxOTM4Mjg0NSwiaXNzIjoiaHR0cDovLzE5Mi4xNjguMTEwLjQzOjgwODIvIiwiYXVkIjoiaHR0cHM6Ly9sb2NhbGhvc3Q6NDQzNTUifQ.jL6pXkb_4AU7WhyOT4YoNwg58oJ1TYNvHCsONS9cOlKX-kMMpnxZLEXmmABjoHVYxLr-4KEA2NMrnC8-2PnvTQ';
            $key = 'C2A2770C1FCDAE3F1C3E87E03486D71314AEDDF45F1A0B1C2D3E4F5A6B7C8D9E0F1A2B3C4D5E6F7A8B9C0D1E2F3A4B5C6D7E8F9A0B1C2';
            $decoded = JWT::decode($jwt, new Key($key, 'HS512'));
            return (array) $decoded;
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}

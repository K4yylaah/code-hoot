<?php
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

echo "CSRF Token: " . csrf_token() . "\n";
echo "Session ID: " . session()->getId() . "\n";
echo "Session Driver: " . config('session.driver') . "\n";

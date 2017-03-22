<?php
if (env('APP_ENV') == 'local') {
    return [
        'bps' => ['port' => 9090, 'address' => '66.66.66.66'],
    ];
} else {
    return [
        'bps' => ['port' => 9090, 'address' => '127.0.0.1'],
    ];
}
?>
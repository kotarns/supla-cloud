<?php
namespace SuplaBundle\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Client;

class TestClient extends Client {
    public function apiRequest(string $method, string $uri, $content = [], array $params = [], array $files = [], array $server = []) {
        if (is_array($content)) {
            $content = json_encode($content);
        }
        $server['HTTP_X-Requested-With'] = 'XMLHttpRequest';
        $server['ACCEPT'] = 'application/json';
        $server['CONTENT_TYPE'] = 'application/json';
        return $this->request($method, $uri, $params, $files, $server, $content);
    }
}

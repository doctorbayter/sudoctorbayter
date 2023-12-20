<?php
// app/Contracts/ManyChatServiceInterface.php

namespace App\Contracts;

interface ManyChatServiceInterface
{
    public function makeApiRequest(string $method, string $endpoint, array $parameters): array;
}

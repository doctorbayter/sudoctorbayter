<?php
// app/Contracts/ManyChatServiceInterface.php

namespace App\Contracts;

interface ManyChatServiceInterface
{
    public function getSubscriberInfo(string $subscriberId): array;
}

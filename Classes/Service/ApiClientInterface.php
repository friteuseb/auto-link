<?php
namespace TalanHdf\AutoLinking\Service;

interface ApiClientInterface
{
    public function sendRequest(string $endpoint, array $data);
}

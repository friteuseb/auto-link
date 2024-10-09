<?php
namespace TalanHdf\AutoLinking\Strategy;

use TalanHdf\AutoLinking\Service\ApiClientInterface;

class ApiSimilarityCalculator implements SimilarityCalculatorInterface
{
    private $apiClient;

    public function __construct(ApiClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    public function calculateSimilarity(string $text1, string $text2): float
    {
        // Utilisation de l'API pour le calcul de similarité
    }
}

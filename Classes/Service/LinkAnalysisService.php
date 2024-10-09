<?php
namespace TalanHdf\AutoLinking\Service;

use TalanHdf\AutoLinking\Strategy\SimilarityCalculatorInterface;

class LinkAnalysisService
{
    private $similarityCalculator;

    public function __construct(SimilarityCalculatorInterface $similarityCalculator)
    {
        $this->similarityCalculator = $similarityCalculator;
    }

    public function analyzeContent(string $content) {}
    public function storeLinks(array $links) {}
    public function deleteLink(int $linkId) {}
}

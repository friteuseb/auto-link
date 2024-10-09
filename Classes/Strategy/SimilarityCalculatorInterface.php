<?php
namespace TalanHdf\AutoLinking\Strategy;

interface SimilarityCalculatorInterface
{
    public function calculateSimilarity(string $text1, string $text2): float;
}

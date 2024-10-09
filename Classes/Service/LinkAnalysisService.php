<?php
namespace TalanHdf\AutoLinking\Service;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class LinkAnalysisService
{
    protected $settings;
    protected $connectionPool;

    public function __construct(ExtensionConfiguration $extensionConfiguration)
    {
        $this->settings = $extensionConfiguration->get('auto_linking');
        $this->connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
    }

    public function analyzeContent(string $content): array
    {
        if ($this->settings['processingMode'] === 'api') {
            return $this->analyzeContentViaApi($content);
        } else {
            return $this->analyzeContentLocally($content);
        }
    }

    protected function analyzeContentViaApi(string $content): array
    {
        // Implement API call to external service
        // This is a placeholder and should be implemented with actual API logic
        $apiUrl = $this->settings['apiUrl'];
        $apiKey = $this->settings['apiKey'];

        // Simulated API call
        $result = [
            ['text' => 'example link', 'url' => 'https://example.com', 'similarity' => 0.8],
        ];

        return $result;
    }

    protected function analyzeContentLocally(string $content): array
    {
        // Implement local PHP processing logic
        // This is a placeholder and should be implemented with actual analysis logic
        $minSimilarity = $this->settings['minSimilarity'];
        $maxLinksPerPage = $this->settings['maxLinksPerPage'];

        // Simulated local analysis
        $result = [
            ['text' => 'local example', 'url' => 'https://local-example.com', 'similarity' => 0.75],
        ];

        return $result;
    }

    public function storeLinks(array $links): void
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_autolinking_links');
        foreach ($links as $link) {
            $queryBuilder
                ->insert('tx_autolinking_links')
                ->values([
                    'text' => $link['text'],
                    'url' => $link['url'],
                    'similarity' => $link['similarity'],
                ])
                ->execute();
        }
    }

    public function deleteLink(int $linkId): void
    {
        $queryBuilder = $this->connectionPool->getQueryBuilderForTable('tx_autolinking_links');
        $queryBuilder
            ->delete('tx_autolinking_links')
            ->where(
                $queryBuilder->expr()->eq('uid', $queryBuilder->createNamedParameter($linkId, \PDO::PARAM_INT))
            )
            ->execute();
    }
}
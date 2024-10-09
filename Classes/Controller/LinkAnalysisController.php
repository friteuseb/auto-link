<?php
namespace TalanHdf\AutoLinking\Controller;

use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TalanHdf\AutoLinking\Service\LinkAnalysisService;

class LinkAnalysisController extends ActionController
{
    protected LinkAnalysisService $linkAnalysisService;

    public function __construct(LinkAnalysisService $linkAnalysisService)
    {
        $this->linkAnalysisService = $linkAnalysisService;
    }

    public function analyzeAction(): ResponseInterface
    {
        $content = $this->request->getArgument('content');
        $results = $this->linkAnalysisService->analyzeContent($content);
        $this->view->assign('results', $results);
        return $this->htmlResponse();
    }

    public function storeAction(): ResponseInterface
    {
        $links = $this->request->getArgument('links');
        $this->linkAnalysisService->storeLinks($links);
        return $this->redirect('analyze');
    }

    public function deleteAction(): ResponseInterface
    {
        $linkId = $this->request->getArgument('linkId');
        $this->linkAnalysisService->deleteLink($linkId);
        return $this->redirect('analyze');
    }
}
<?php


namespace Voice\Controller;




use Voice\Entity\PositionEntity;
use Zend\Dom\Document\Query;
use Zend\Dom\Document;
use Zend\Http\ClientStatic;
use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;

class ReptileController extends AbstractActionController
{



    public function indexAction()
    {

        $content = file_get_contents('http://voice.hupu.com/nba/nba');


        $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'utf-8');

        $document = new Document($content);
        $nodeList = QUERY::execute('.whiteBorder dl', $document, Query::TYPE_CSS);

//        var_dump(iconv('gbk','utf-8',$nodeList->current()->nodeValue));exit;

        foreach ($nodeList as $node) {
            /**
             * @var $node \DOMElement
             */
            echo $node->nodeValue, '<br>';
        }

        exit;
    }


}
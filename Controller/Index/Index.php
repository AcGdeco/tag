<?php
declare(strict_types=1);

namespace Deco\Tag\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Deco\Tag\Helper\Image;

class Index extends Action implements HttpPostActionInterface
{

    protected $image;

    public function __construct(
        Image $image,
        Context $context
    ){
        $this->image = $image;
        parent::__construct($context);
    }

    public function execute()
    {
        $ids = $this->getRequest()->getParam('ids');
        $ids = json_decode($ids, true);
        $tagsUrl = $this->image->getImageUrl();

        $tags = [];
        foreach ($ids as $id) {
            $tags[] = $this->image->getProductTag($id);
            $tagsUrlProduct[] = $this->image->getImageUrlProduct($id);
        }

        $data[] = $ids;
        $data[] = $tags;
        $data[] = $tagsUrl;
        $data[] = $tagsUrlProduct;

        $response = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $response->setData($data);
        return $response;
        
    }
}
<?php

namespace Deco\Tag\Model;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterfaceFactory;
use Magento\Framework\Registry;
use Deco\Tag\Helper\Image;

class ProductImage extends Template
{
    protected $_productRepositoryFactory;
    protected $registry;
    protected $image;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterfaceFactory $productRepositoryFactory,
        Registry $registry,
        Image $image,
        array $data = []
    ) {
        $this->_productRepositoryFactory = $productRepositoryFactory;
        $this->registry = $registry;
        $this->image = $image;
        parent::__construct($context, $data);
    }

    public function getProductId()
    {
        $product = $this->registry->registry('current_product');

        return $product->getId();
    }

    public function getImageUrlAdmin()
    {
        return $this->image->getImageUrl();
    }

    public function getImageUrl()
    {
        $product = $this->_productRepositoryFactory->create()->getById($this->getProductId());
        $imageBlock =  $block->getLayout()->createBlock('Magento\Catalog\Block\Product\ListProduct');
        $productImage = $imageBlock->getImage($product, 'Etiqueta_1');
        $etiqueta = [
            $product->getData('Etiqueta_1'),
            $product->getData('Etiqueta_2'),
            $product->getData('Etiqueta_3'),
            $product->getData('Etiqueta_4')
        ];

        return $etiqueta;
    }
}

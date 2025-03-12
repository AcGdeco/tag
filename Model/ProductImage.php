<?php

namespace Deco\Tag\Model;

use Magento\Framework\View\Element\Template;
use Magento\Catalog\Api\ProductRepositoryInterfaceFactory;
use Magento\Framework\Registry;
use Deco\Tag\Helper\Image;
use Magento\Catalog\Block\Product\View;
use Magento\Store\Model\StoreManagerInterface;

class ProductImage extends Template
{
    protected $_productRepositoryFactory;
    protected $registry;
    protected $image;
    protected $view;
    protected $storeManager;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterfaceFactory $productRepositoryFactory,
        Registry $registry,
        Image $image,
        View $view,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->_productRepositoryFactory = $productRepositoryFactory;
        $this->registry = $registry;
        $this->image = $image;
        $this->view = $view;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
    }

    public function getProductId()
    {
        $product = $this->registry->registry('current_product');

        return $product->getId();
    }

    public function getProductTag()
    {
        $_code = 'etiqueta_select';
        $_product = $this->view->getProduct();
        $etiquetaSelect = $_product->getAttributeText($_code);

        return $etiquetaSelect;
    }

    public function getImageAdminUrl()
    {
        return $this->image->getImageUrl();
    }

    public function getImageUrl()
    {
        $product = $this->view->getProduct();
        $urlBase = $this->storeManager->getStore()->getBaseUrl();
        $url = $urlBase."media/catalog/product";

        if($product->getData('Etiqueta_1') != "no_selection") {
            $path1 = $url.$product->getData('Etiqueta_1');
        } else {
            $path1 = $product->getData('Etiqueta_1');
        }

        if($product->getData('Etiqueta_2') != "no_selection") {
            $path2 = $url.$product->getData('Etiqueta_2');
        } else {
            $path2 = $product->getData('Etiqueta_2');
        }

        if($product->getData('Etiqueta_3') != "no_selection") {
            $path3 = $url.$product->getData('Etiqueta_3');
        } else {
            $path3 = $product->getData('Etiqueta_3');
        }

        if($product->getData('Etiqueta_4') != "no_selection") {
            $path4 = $url.$product->getData('Etiqueta_4');
        } else {
            $path4 = $product->getData('Etiqueta_4');
        }

        $etiqueta = [
            $path1,
            $path2,
            $path3,
            $path4
        ];

        return $etiqueta;
    }
}

<?php
namespace Deco\Tag\Helper;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class Image extends Template
{
    protected $scopeConfig;
    protected $storeManager;
    protected $productRepository;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        ProductRepositoryInterface $productRepository,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function getEnable()
    {
        $enable = $this->scopeConfig->getValue('decotag/general/enable',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        return $enable;
    }

    public function getImageUrl()
    {
        $urlBase = $this->storeManager->getStore()->getBaseUrl();
        $url = $urlBase."media/Deco_Tag/view/frontend/web/image/tag/";

        if(!empty($this->scopeConfig->getValue('decotag/general/upload_image_1',\Magento\Store\Model\ScopeInterface::SCOPE_STORE))) {
            $path1 = $url.$this->scopeConfig->getValue('decotag/general/upload_image_1',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            $path1 = null;
        }

        if(!empty($this->scopeConfig->getValue('decotag/general/upload_image_2',\Magento\Store\Model\ScopeInterface::SCOPE_STORE))) {
            $path2 = $url.$this->scopeConfig->getValue('decotag/general/upload_image_2',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            $path2 = null;
        }

        if(!empty($this->scopeConfig->getValue('decotag/general/upload_image_3',\Magento\Store\Model\ScopeInterface::SCOPE_STORE))) {
            $path3 = $url.$this->scopeConfig->getValue('decotag/general/upload_image_3',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            $path3 = null;
        }

        if(!empty($this->scopeConfig->getValue('decotag/general/upload_image_4',\Magento\Store\Model\ScopeInterface::SCOPE_STORE))) {
            $path4 = $url.$this->scopeConfig->getValue('decotag/general/upload_image_4',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        } else {
            $path4 = null;
        }

        $imageUrl = [
            $path1,
            $path2,
            $path3,
            $path4,
        ];
        
        return $imageUrl;
    }

    public function getImageUrlProduct($id)
    {
        $product = $this->productRepository->getById($id);
        $urlBase = $this->storeManager->getStore()->getBaseUrl();
        $url = $urlBase."media/catalog/product";

        if(!empty($product->getData('Etiqueta_1')) && $product->getData('Etiqueta_1') != "no_selection") {
            $path1 = $url.$product->getData('Etiqueta_1');
        } else {
            $path1 = null;
        }

        if(!empty($product->getData('Etiqueta_2')) && $product->getData('Etiqueta_2') != "no_selection") {
            $path2 = $url.$product->getData('Etiqueta_2');
        } else {
            $path2 = null;
        }

        if(!empty($product->getData('Etiqueta_3')) && $product->getData('Etiqueta_3') != "no_selection") {
            $path3 = $url.$product->getData('Etiqueta_3');
        } else {
            $path3 = null;
        }

        if(!empty($product->getData('Etiqueta_4')) && $product->getData('Etiqueta_4') != "no_selection") {
            $path4 = $url.$product->getData('Etiqueta_4');
        } else {
            $path4 = null;
        }

        $etiqueta = [
            $path1,
            $path2,
            $path3,
            $path4
        ];

        return $etiqueta;
    }

    function getProductTag($id){
        $product = $this->productRepository->getById($id);
        $tag = $product->getAttributeText("etiqueta_select");
        return $tag;
    }
}
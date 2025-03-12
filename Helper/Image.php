<?php
namespace Deco\Tag\Helper;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class Image extends Template
{
    protected $scopeConfig;
    protected $storeManager;

    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        parent::__construct($context, $data);
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
}
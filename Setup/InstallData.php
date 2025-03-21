<?php

namespace Deco\Tag\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        $eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY, 'top_banner_image');
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Etiqueta_1',
            [
                'type' => 'varchar',
                'label' => 'Etiqueta 1',
                'input' => 'media_image',
                'frontend' => 'Magento\Catalog\Model\Product\Attribute\Frontend\Image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'filterable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'sort_order' => 100,
                'required' => false,
                'used_for_sort_by' => false,
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Etiqueta_2',
            [
                'type' => 'varchar',
                'label' => 'Etiqueta 2',
                'input' => 'media_image',
                'frontend' => 'Magento\Catalog\Model\Product\Attribute\Frontend\Image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'filterable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'sort_order' => 100,
                'required' => false,
                'used_for_sort_by' => false,
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Etiqueta_3',
            [
                'type' => 'varchar',
                'label' => 'Etiqueta 3',
                'input' => 'media_image',
                'frontend' => 'Magento\Catalog\Model\Product\Attribute\Frontend\Image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'filterable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'sort_order' => 100,
                'required' => false,
                'used_for_sort_by' => false,
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'Etiqueta_4',
            [
                'type' => 'varchar',
                'label' => 'Etiqueta 4',
                'input' => 'media_image',
                'frontend' => 'Magento\Catalog\Model\Product\Attribute\Frontend\Image',
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'filterable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => false,
                'sort_order' => 100,
                'required' => false,
                'used_for_sort_by' => false,
            ]
        );
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'etiqueta_select',
            [
                'type' => 'varchar',
                'label' => 'Selecione a etiqueta',
                'input' => 'select',
                'source' => \Magento\Eav\Model\Entity\Attribute\Source\Table::class,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'General',
                'visible' => true,
                'required' => false,
                'user_defined' => true,
                'default' => '',
                'searchable' => false,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => false,
                'used_in_product_listing' => true,
                'used_for_sort_by' => false,
                'unique' => false,
                'apply_to' => 'simple,configurable,virtual,bundle,downloadable',
                'sort_order' => 1200,
                'option' => ['values' => ['Etiqueta 1', 'Etiqueta 2', 'Etiqueta 3', 'Etiqueta 4']]
            ]
        );
    }
}
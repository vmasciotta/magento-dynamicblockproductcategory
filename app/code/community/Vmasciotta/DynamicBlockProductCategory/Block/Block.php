<?php

class Vmasciotta_DynamicBlockProductCategory_Block_Block extends Mage_Core_Block_Template
{

    /**
     * @param array $conditions
     *
     * @return Mage_Eav_Model_Entity_Collection_Abstract
     */
    protected function _getCollection(array $conditions)
    {

        $blockCollection = Mage::getModel('cms/block')->getCollection()
            ->addFieldToSelect('identifier')
            ->addFieldToFilter('identifier',$conditions)
            ->addStoreFilter($this->_getApp()->getStore()->getId())
            ->addFieldToFilter('is_active', true);

            return $blockCollection;
    }

    /**
     * @param Mage_Catalog_Model_Product $product
     *
     * @return array
     */
    protected function _getConditions($product)
    {
        $categoryIds = $product->getCategoryIds();

        $conditions = [];
        foreach ($categoryIds as $categoryId) {
            $conditions[] = ['like'=>'category'.$categoryId.'-%'];
        }

        return $conditions;
    }

    /**
     * @return string
     */
    protected function _prepareData()
    {
        $product = Mage::registry('product');
        $conditions = $this->_getConditions($product);
        $blockCollection = $this->_getCollection($conditions);
        if ($blockCollection->count() !== 0) {
            $identifier = $blockCollection->getFirstItem()->getIdentifier();
            return $this->getLayout()->createBlock('cms/block')->setBlockId($identifier)->toHtml();
        }
        return '';

    }

    protected function _toHtml()
    {
        return $this->_prepareData();
    }
}
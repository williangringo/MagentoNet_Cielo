<?php
/**
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   payment
 * @package    Multimodulos_Multicielo
 * @copyright  Copyright (c) 2011 MagentoNet (www.magento.net.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     MagentoNet <contato@magento.net.br>
 */

class MagentoNet_Cieloo_Model_Source_Bandeiras
{
	public function toOptionArray ()
	{
		$options = array();
        
        $options[] = array('code' => 'visa',                'label' => Mage::helper('adminhtml')->__('Visa'));
        $options[] = array('code' => 'mastercard',          'label' => Mage::helper('adminhtml')->__('Mastercard'));
        $options[] = array('code' => 'diners',              'label' => Mage::helper('adminhtml')->__('Diners'));
        $options[] = array('code' => 'discover',            'label' => Mage::helper('adminhtml')->__('Discover'));
        $options[] = array('code' => 'elo',                 'label' => Mage::helper('adminhtml')->__('Elo'));
        $options[] = array('code' => 'amex',                'label' => Mage::helper('adminhtml')->__('Amex'));
        $options[] = array('code' => 'jcb',                 'label' => Mage::helper('adminhtml')->__('JCB'));
        $options[] = array('code' => 'aura',                'label' => Mage::helper('adminhtml')->__('Aura'));
        $options[] = array('code' => 'visadebito',          'label' => Mage::helper('adminhtml')->__('Visa Débito'));
        $options[] = array('code' => 'mastercarddebito',    'label' => Mage::helper('adminhtml')->__('Mastercard Débito'));
         
        
		return $options;
	}

}

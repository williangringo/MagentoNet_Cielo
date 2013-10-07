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

class MagentoNet_Cielo_Model_Source_TipoParcelamento
{
	public function toOptionArray ()
	{
            $options = array();
            $options['2'] = Mage::helper('adminhtml')->__('Parcelado Loja');
            $options['3'] = Mage::helper('adminhtml')->__('Parcelado Estabelecimento');
            return $options;
	}

}

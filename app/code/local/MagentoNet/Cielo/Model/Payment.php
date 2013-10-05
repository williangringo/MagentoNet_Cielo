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
 * @package    Multikomerce_Redecard
 * @copyright  Copyright (c) 2011 MagentoNet (www.magento.net.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     MagentoNet <contato@magento.net.br>
 */

class MagentoNet_Cielo_Model_Payment extends Mage_Payment_Model_Method_Cc
{

    protected $_code  = 'cielo';
    //protected $_formBlockType = 'cielo/form';
    //protected $_infoBlockType = 'cielo/info';

    //Is this payment method a gateway (online auth/charge) ?
    //=======================================================
    protected $_isGateway               = true;

    //Can authorize online?
    //=====================
    protected $_canAuthorize            = true;

    // Can capture funds online?
    //==========================
    protected $_canCapture              = true;

    //Can capture partial amounts online?
    //===================================
    protected $_canCapturePartial       = true;

    //Can refund online?
    //==================
    protected $_canRefund               = true;
    protected $_canRefundInvoicePartial     = true;

    //Can void transactions online?
    //=============================
    protected $_canVoid                 = true;

    //Can use this payment method in administration panel?
    //====================================================
    protected $_canUseInternal          = true;

    // Can show this payment method as an option on checkout payment page?
    //====================================================================
    protected $_canUseCheckout          = true;

    // Is this payment method suitable for multi-shipping checkout?
    //=============================================================
    protected $_canUseForMultishipping  = true;

    //Can save credit card information for future processing?
    //========================================================
    protected $_canSaveCc = false;

    protected $_isInitializeNeeded      = false;




    /**=====================================
     * Assign data to info model instance
     *
     * @param   mixed $data
     * @return  Mage_Payment_Model_Info
     ======================================*/
    public function assignData($data)
    {
       /* if (!($data instanceof Varien_Object)) {
            $data = new Varien_Object($data);
        }
        $info = $this->getInfoInstance();
        $additionaldata = array('Cc_parcelas' => $data->getCcParcelas(), 'cc_cid_enc' => $info->encrypt($data->getCcCid()));
        $info->setCcType($data->getCcType())
            ->setAdditionalData(serialize($additionaldata))
            ->setCcOwner($data->getCcOwner())
            ->setCcLast4(substr($data->getCcNumber(), -4))
            ->setCcNumber($data->getCcNumber())
            ->setCcCid($data->getCcCid())
            ->setCcExpMonth($data->getCcExpMonth())
            ->setCcExpYear($data->getCcExpYear())
            ->setCcSsIssue($data->getCcSsIssue())
            ->setCcSsStartMonth($data->getCcSsStartMonth())
            ->setCcSsStartYear($data->getCcSsStartYear())
            ->setCcNumberEnc($info->encrypt($data->getCcNumber())) //criptografa o numero do cartão
            ->setCcCidEnc($info->encrypt($data->getCcCid())) //criptografa o código de segurança do cartão
        ; */
        return $this;
    }


    /**========================================================
     * Prepare info instance for save
     * Prepara a instancia info para receber os dados do cartão
     * @return Mage_Payment_Model_Abstract
     ==========================================================*/
    public function prepareSave()
    {
        $info = $this->getInfoInstance();

        $info->setCcNumber(null) //apaga o numero descriptografado
            ->setCcCid(null); //apaga o código de segurança descriptografado

        return $this;
    }



    /**=======================================
    | Authorize payment abstract method
    |
    | @param Varien_Object $payment
    | @param float $amount
    |
    | @return Mage_Payment_Model_Abstract
    =========================================*/
    public function authorize(Varien_Object $payment, $amount)
    {
       // if (!$this->canAuthorize()) {
           // Mage::throwException(Mage::helper('payment')->__('Authorize action is not available.'));
        //}
        //echo "Erro"; exit();
        return $this;
    }


    /**
     * Capture payment abstract method
     *
     * @param Varien_Object $payment
     * @param float $amount
     *
     * @return Mage_Payment_Model_Abstract
     */
    public function capture(Varien_Object $payment, $amount)
    {
        if (!$this->canCapture()) {
            Mage::throwException(Mage::helper('payment')->__('Capture action is not available.'));
        }
        echo "opa"; exit();
        return $this;
    }



    /**
     * Set transaction ID into creditmemo for informational purposes
     * @param Mage_Sales_Model_Order_Creditmemo $creditmemo
     * @param Mage_Sales_Model_Order_Payment $payment
     * @return Mage_Payment_Model_Method_Abstract
     */
    public function processCreditmemo($creditmemo, $payment)
    {
        $creditmemo->setTransactionId($payment->getLastTransId());
        return $this;
    }

    /**
     * Refund specified amount for payment
     *
     * @param Varien_Object $payment
     * @param float $amount
     *
     * @return Mage_Payment_Model_Abstract
     */
    public function refund(Varien_Object $payment, $amount)
    {

        //echo "devolver"; exit();

        if (!$this->canRefund()) {
            Mage::throwException(Mage::helper('payment')->__('Refund action is not available.'));
        }


        return $this;
    }


   /* public function getOrderPlaceRedirectUrl($orderId = 0)
    {
        $params = array();
        $params['_secure'] = true;

        if ($orderId != 0 && is_numeric($orderId)) {
            $params['order_id'] = $orderId;
        }



        return Mage::getUrl('cielo/Pay/redirect', $params);
    } */

}
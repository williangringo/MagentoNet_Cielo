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
    protected $_formBlockType = 'cielo/form';
    //protected $_infoBlockType = 'cielo/info';

    //Is this payment method a gateway (online auth/charge) ?
    //=======================================================
    protected $_isGateway               = false;

    //Can authorize online?
    //=====================
    protected $_canAuthorize            = false;

    // Can capture funds online?
    //==========================
    protected $_canCapture              = true;

    //Can capture partial amounts online?
    //===================================
    protected $_canCapturePartial       = false;

    //Can refund online?
    //==================

    protected $_canRefundInvoicePartial     = false; //isso só funciona no magento EE
    protected $_canRefund                   = true; //o estorno online somente está disponível no magento EE, porém ainda é possivel fazer o estorno para controle no admin

    //Can void transactions online?
    //=============================
    protected $_canVoid                 = true;     //cancelar a transação antes de capturar

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

    protected $_isInitializeNeeded      = true;
    protected $_canReviewPayment = true; // changed PJS to true




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

    public function validate() {
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




    public function getOrderPlaceRedirectUrl()
    {
        //verifica quantos cartões foram digitados - no máximo dois(page com dois cartões)
        foreach($cartoes as $cartao):
            //Se pagamento for débito, faz a criação de transação para receber a url de autenticação
            if($paymenttipe == 'debit'){
                //guarda a url de autenticação no arrya $retornos

            } elseif($paymenttipe == 'credit'){
                //faz a autorização de crédito e guarda na array $retornos

            }
        endforeach;


        //verifica se uma das duas autorizações foi negada e redireciona o cliente para erro, após cancelar a autorização que foi bem sucedida


        //se tiver um retorno de url, redireciona o cliente para autenticação, caso contrário para o sucesso

        return 'http://www.uol.com.br';
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
        //echo "opa"; exit();
        return $this;
    }






    /**===================================
     * Refund specified amount for payment
     * ISSO SÓ FUNCIONA NO MAGENTO EE, POR ISSO NÃO FOI IMPLEMENTADO
     *
     * @param Varien_Object $payment
     * @param float $amount
     *
     * @return Mage_Payment_Model_Abstract
     ====================================*/
   /* public function refund(Varien_Object $payment, $amount)
    {

        if (!$this->canRefund()) {
            Mage::throwException(Mage::helper('payment')->__('Refund action is not available.'));
        }


        return $this;
    } */



    /**
     * called if voiding a payment
     */
    public function void (Varien_Object $payment)
    {
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
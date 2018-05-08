<?php

namespace ByTIC\Omnipay\Payu\Message;

use ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Message\CompletePurchaseResponse as AbstractResponse;

/**
 * Class PurchaseResponse
 * @package ByTIC\Common\Payments\Gateways\Providers\AbstractGateway\Messages
 */
class CompletePurchaseResponse extends AbstractResponse
{

    /**
     * Response Message
     *
     * @return null|string A response message from the payment gateway
     */
    public function getMessage()
    {
        if (!$this->isSuccessful()) {
            return 'Error authorising payment';
        }
        return parent::getMessage();
    }

    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->data['valid'] === true;
    }

    /**
     * @inheritdoc
     */
    public function processModel()
    {
        return $this;
    }
}

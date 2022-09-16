<?php

namespace App\Model;

use App\Model\Base;

class Bill
{


    private string $idBill;
    private string $titleBill;
    private string $service;
    private string $dateBill;
    private float $priceHT;
    private float $vat;
    private float $priceTTC;
    private int $idClient;
    private string $billNumber;

    /**
     * Get the value of idBill
     */
    public function getIdBill()
    {
        return $this->idBill;
    }

    /**
     * Set the value of idBill
     *
     * @return  self
     */
    public function setIdBill($idBill)
    {
        $this->idBill = $idBill;

        return $this;
    }

    /**
     * Get the value of titleBill
     */
    public function getTitleBill()
    {
        return $this->titleBill;
    }

    /**
     * Set the value of titleBill
     *
     * @return  self
     */
    public function setTitleBill($titleBill)
    {

        $this->titleBill = $titleBill;

        return $this;
    }

    /**
     * Get the value of dateBill
     */
    public function getDateBill()
    {
        return $this->dateBill;
    }

    /**
     * Set the value of dateBill
     *
     * @return  self
     */
    public function setDateBill($dateBill)
    {
        $this->dateBill = $dateBill;

        return $this;
    }

    /**
     * Get the value of priceHT
     */
    public function getPriceHT()
    {
        return $this->priceHT;
    }

    /**
     * Set the value of priceHT
     *
     * @return  self
     */
    public function setPriceHT($priceHT)
    {
        $this->priceHT = $priceHT;

        return $this;
    }
    /**
     * Get the value of vat
     * @return int
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set the value of vat
     *
     * @return  self
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }
    /**
     * Get the value of priceTTC
     */
    public function getPriceTTC()
    {
        return $this->priceTTC;
    }

    /**
     * Set the value of priceTTC
     *
     * @return  self
     */
    public function setPriceTTC($priceTTC)
    {
        $this->priceTTC = $priceTTC;
        return $this;
    }



    /**
     * Get the value of service
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set the value of service
     *
     * @return  self
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of idClient
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }


    /**
     * Get the value of billNumber
     */
    public function getBillNumber()
    {
        return $this->billNumber;
    }

    /**
     * Set the value of billNumber
     *
     * @return  self
     */
    public function setBillNumber($billNumber)
    {
        $this->billNumber = $billNumber;
        return $this;
    }
}
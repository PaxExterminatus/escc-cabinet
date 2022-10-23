<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

abstract class BillStructure
{
    function getBillId(): ?string
    {
        return null;
    }

    abstract function getEripId(): int;
    abstract function getInvId(): string;

    /**
     * Date of bill creation.
     * @return string|null
     */
    function getAddedDt(): ?string
    {
        $time = intval(microtime(true) * 1000);
        return "/Date({$time}+0300)/";
    }

    /**
     * Bill validity period. Must be greater than creation date (DueDt > AddedDt).
     * @return string|null
     */
    function getDueDt(): ?string
    {
        $time = intval(microtime(true) * 1000) + 86400 * 1000;
        return "/Date({$time}+0300)/";
    }

    function getPayedDt(): ?string
    {
        return null;
    }

    abstract function getFullName(): string;

    function getMobilePhone(): ?string
    {
        return null;
    }

    function getNotifyByMobilePhone(): bool
    {
        return true;
    }

    function getEmail(): ?string
    {
        return null;
    }

    function getNotifyByEMail(): bool
    {
        return true;
    }

    function getFullAddress(): ?string
    {
        return null;
    }

    abstract function getAmt(): float;

    abstract function getCurr(): int;

    abstract function getStatusEnum(): int;

    function getInfo(): ?string
    {
        return null;
    }

    function getProducts(): ?array {
        return null;
    }

    function toArray(): array
    {
        return [
            'billID' => $this->getBillId(),
            'eripId' => $this->getEripId(),
            'invId' => $this->getInvId(),
            'dueDt' => $this->getDueDt(),
            'addedDt' => $this->getAddedDt(),
            'payedDt' => $this->getPayedDt(),
            'fullName' => $this->getFullName(),
            'mobilePhone' => $this->getMobilePhone(),
            'notifyByMobilePhone' => $this->getNotifyByMobilePhone(),
            'email' => $this->getEmail(),
            'notifyByEMail' => $this->getNotifyByEMail(),
            'fullAddress' => $this->getFullAddress(),
            'amt' => $this->getAmt(),
            'curr' => $this->getCurr(),
            'statusEnum' => $this->getStatusEnum(),
            'info' => $this->getInfo(),
            'products' => [
                [
                    'invItemId' => 'pay',
                    'desc' => 'desc',
                    'count' => 1,
                    'amt' => $this->getAmt(),
                ],
            ]
        ];
    }
}

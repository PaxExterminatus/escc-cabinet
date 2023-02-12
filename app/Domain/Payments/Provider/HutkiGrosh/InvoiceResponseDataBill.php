<?php

namespace App\Domain\Payments\Provider\HutkiGrosh;

class InvoiceResponseDataBill
{
    public ?int $billID; // Внутренний идентификатор выставленного счета
    public int $eripId; // Идентификатор услуги в ЕРИП
    public int $invId; // Номер счета, заказа
    public string $dueDt; // Срок оплаты счета
    public string $addedDt; // Дата выставления счета
    public ?string $payedDt; // Дата оплаты счета
    public string $fullName; // ФИО клиента
    public ?string $mobilePhone; // Мобильный телефон клиента
    public bool $notifyByMobilePhone; // Состояние информирования с помощью SMS
    public ?string $email; // Электронная почта клиента
    public bool $notifyByEmail; // Состояние информирования по электронной почте
    public ?string $fullAddress; // Полный адрес клиента
    public float $amt; // Сумма счета
    public string $curr; // Валюта счета (BYN)
    public float $firstPaymentAmt; // Сумма первого платежа (предоплаты) по счету
    /**
     * @var int
     * [-1] - NotSet (Не установлено)
     * [1] - PaymentPending (Ожидание оплаты)
     * [2] - Outstending (Просроченный)
     * [3] - DeletedByUser (Удален)
     * [4] - PaymentCancelled (Прерван)
     * [5] - Payed (Оплачен)
     */
    public int $statusEnum; // Состояние счета [PurchItemStatus]
    public string $info; // Владелец счета
    public ?string $paymentSource; // Способы авторизации суммы
    public array $products; // Список товаров/услуг [ProductInfo]
    public ?string $eripTrxId; // Идентификатор операции в ЕРИП

    function __construct(array $data)
    {
        $this->billID = $data['billID'] ?? null;
        $this->eripId = $data['eripId'] ?? null;
        $this->invId = (int)$data['invId'] ?? null;
        $this->dueDt = $data['dueDt'] ?? null;
        $this->addedDt = $data['addedDt'] ?? null;
        $this->payedDt = $data['payedDt'] ?? null;
        $this->fullName = $data['fullName'] ?? null;
        $this->mobilePhone = $data['mobilePhone'] ?? null;
        $this->notifyByMobilePhone = $data['notifyByMobilePhone'] ?? null;
        $this->notifyByEmail = $data['notifyByEmail'] ?? true;
        $this->fullAddress = $data['fullAddress'] ?? null;
        $this->amt = $data['amt'] ?? null;
        $this->curr = $data['curr'] ?? null;
        $this->firstPaymentAmt = $data['firstPaymentAmt'] ?? 0;
        $this->statusEnum = $data['statusEnum'] ?? null;
        $this->info = $data['info'] ?? null;
        $this->paymentSource = $data['paymentSource'] ?? null;
        $this->products = $data['products'] ?? null;
        $this->eripTrxId = $data['eripTrxId'] ?? null;
    }

    static function make(array $data): static
    {
        return new static($data);
    }
}

<?php


namespace App\Repository\Payments;

use App\Entities\QueryParams\QueryParam;

/**
 * Trait UserPaymentsParamsTrait
 * @property UserPaymentsParam|QueryParam $user_id
 * @property UserPaymentsParam|QueryParam $client_id
 * @package App\Repository\Payments
 */
trait UserPaymentsParamsTrait
{
    public QueryParam $user_id;
    public QueryParam $client_id;

    protected function constructParams(): void
    {
        $this->user_id = QueryParam::make($this);
        $this->client_id = QueryParam::make($this);
    }
}

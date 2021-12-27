<?php

namespace App\Http\Resources;

use App\Traits\Resource\FlexParam;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    use FlexParam;

    public function toArray($request)
    {
        $this->flexParamInit();

        return [
            'order_id'          => $this->order_id,
            'account_number'    => $this->account_number,
            'product_code'      => $this->product_code,
            'product_name'      => $this->product_name,
            'category'          => $this->category,
            'amount'            => $this->amount ?? 0,
            'token'             => $this->when($this->token, $this->token),
            'admin_fee'         => $this->when($this->admin_fee, $this->admin_fee),
            'status'            => $this->status,
        ];
    }
}

<?php

declare(strict_types=1);


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

final class Billing extends Model
{
    use HasFactory;

    protected $table = 'billings';

    protected $fillable = [
        'customer_account_number',
        'invoice_number',
        'site_identifier',
        'billing_start_date',
        'billing_end_date',
        'total_amount',
        'electricity_usage',
    ];

    public function getBillingEndDate(): ?Carbon
    {
        return $this->getAttribute('billing_end_date');
    }

    public function getBillingStartDate(): ?Carbon
    {
        return $this->getAttribute('billing_start_date');
    }

    public function getCustomerAccountNumber(): string
    {
        return $this->getAttribute('customer_account_number');
    }

    public function getElectricityUsage(): string
    {
        return $this->getAttribute('electricity_usage');
    }

    public function getInvoiceNumber(): string
    {
        return $this->getAttribute('invoice_number');
    }

    public function getSiteIdentifier(): string
    {
        return $this->getAttribute('site_identifier');
    }

    public function getTotalAmount(): string
    {
        return $this->getAttribute('total_amount');
    }
}

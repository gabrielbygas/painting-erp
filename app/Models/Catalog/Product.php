<?php

declare(strict_types=1);

namespace App\Models\Catalog;

use App\Models\BaseModel;
use App\Models\Core\Color;
use App\Models\Core\PackagingType;
use App\Models\Core\ProductCategory;
use App\Models\Core\ProductType;
use App\Models\Core\TaxRate;
use App\Models\Core\Unit;
use App\Models\Inventory\Stock;
use App\Models\Purchasing\PurchaseOrderItem;
use App\Models\Purchasing\PurchaseReceiptItem;
use App\Models\Purchasing\PurchaseRequestItem;
use App\Models\Purchasing\PurchaseReturnItem;
use App\Models\Purchasing\SupplierInvoiceItem;
use App\Models\Sales\CustomerInvoiceItem;
use App\Models\Sales\DeliveryNoteItem;
use App\Models\Sales\QuotationItem;
use App\Models\Sales\SalesOrderItem;
use App\Models\Sales\SalesReturnItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'brand_id',
        'product_type_id',
        'product_category_id',
        'base_unit_id',
        'packaging_type_id',
        'color_id',
        'tax_rate_id',

        'sku',
        'barcode',

        'name',
        'description',

        'minimum_stock',
        'maximum_stock',

        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'minimum_stock' => 'decimal:2',
            'maximum_stock' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function productType(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function baseUnit(): BelongsTo
    {
        return $this->belongsTo(Unit::class, 'base_unit_id');
    }

    public function packagingType(): BelongsTo
    {
        return $this->belongsTo(PackagingType::class);
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function taxRate(): BelongsTo
    {
        return $this->belongsTo(TaxRate::class);
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function stocks(): HasMany
    {
        return $this->hasMany(Stock::class);
    }

    public function quotationItems(): HasMany
    {
        return $this->hasMany(QuotationItem::class);
    }

    public function salesOrderItems(): HasMany
    {
        return $this->hasMany(SalesOrderItem::class);
    }

    public function deliveryNoteItems(): HasMany
    {
        return $this->hasMany(DeliveryNoteItem::class);
    }

    public function customerInvoiceItems(): HasMany
    {
        return $this->hasMany(CustomerInvoiceItem::class);
    }

    public function salesReturnItems(): HasMany
    {
        return $this->hasMany(SalesReturnItem::class);
    }

    public function purchaseRequestItems(): HasMany
    {
        return $this->hasMany(PurchaseRequestItem::class);
    }

    public function purchaseOrderItems(): HasMany
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }

    public function purchaseReceiptItems(): HasMany
    {
        return $this->hasMany(PurchaseReceiptItem::class);
    }

    public function purchaseReturnItems(): HasMany
    {
        return $this->hasMany(PurchaseReturnItem::class);
    }

    public function supplierInvoiceItems(): HasMany
    {
        return $this->hasMany(SupplierInvoiceItem::class);
    }
}
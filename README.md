# Painting ERP

> Modern ERP for Paint Distribution & Sales Management

---

# Overview

**Painting ERP** is a modern Enterprise Resource Planning (ERP) solution designed for companies that sell, distribute and manage paint products.

The application is designed with a Domain-Driven architecture while keeping the standard Laravel 13 structure.

Primary language: **French**

Secondary language: **English**

---

# Current Scope

The ERP is dedicated to **paint product management**, **not paint manufacturing**.

Supported businesses:

- Paint Retailers
- Paint Wholesalers
- Paint Distributors
- Hardware Stores
- Construction Material Stores

Future versions may include Manufacturing.

---

# Technology Stack

| Technology | Version |
|------------|----------|
| PHP | 8.4+ |
| Laravel | 13 |
| Vue.js | 3 |
| Tailwind CSS | 4 |
| MySQL | 8 |
| Vite | Latest |
| Laravel Breeze | Latest |
| Spatie Permission | Latest |

---

# Architecture

```
app/

├── Http/
│   ├── Controllers/
│   ├── Requests/
│   └── Resources/
│
├── Models/
│
└── Services/
```

Business logic is implemented inside **Services**.

Controllers remain thin.

---

# Development Principles

- Laravel Best Practices
- Domain Driven ERP
- Thin Controllers
- Business Logic in Services
- UUID Primary Keys
- API Resources
- Form Requests
- Repository-free Architecture
- SOLID
- DRY
- KISS
- Clean Code

---

# Multilingual Strategy

Default language

- French

Supported language

- English

Database fields

```
name_fr

name_en
```

---

# Database Standards

Engine

- MySQL 8

Primary Keys

- UUID

Naming

- snake_case

Tables

- plural

Soft Deletes

- Enabled where necessary

---

# Security

- Authentication
- Authorization (Spatie Permission)
- CSRF Protection
- XSS Protection
- SQL Injection Protection
- Password Hashing
- Audit Logs
- Policies
- Validation via Form Requests

---

# Domains

```
Core

Administration

Settings

Infrastructure

Catalog

Customers

Suppliers

Inventory

Documents

Purchasing

Sales

Finance
```

---

# Models Overview

## Core

```
Country
Language
Currency
ExchangeRate
TaxRate
Unit
PackagingType
Color
ProductType
ProductCategory
FinancialInstitution
PaymentMethod
AddressType
JobTitle
```

---

## Administration

```
User
Role
Permission
UserSession
AuditLog
Notification
SystemSetting
```

---

## Settings

```
Company
CompanyBranch
```

---

## Infrastructure

```
Warehouse
```

---

## Catalog

```
Brand
Product
ProductVariant
```

---

## Customers

```
Customer
CustomerAddress
CustomerContact
CustomerBankAccount
```

---

## Suppliers

```
Supplier
SupplierAddress
SupplierContact
SupplierBankAccount
```

---

## Inventory

```
Stock
StockMovementType
StockMovement
StockCount
StockCountItem
StockAdjustment
StockAdjustmentItem
StockTransfer
StockTransferItem
```

---

## Documents

```
DocumentType
DocumentStatus
DocumentSequence
Document
DocumentAttachment
DocumentComment
```

---

## Purchasing

```
PurchaseRequest
PurchaseRequestItem

PurchaseOrder
PurchaseOrderItem

PurchaseReceipt
PurchaseReceiptItem

PurchaseReturn
PurchaseReturnItem

SupplierInvoice
SupplierInvoiceItem
```

---

## Sales

```
Quotation
QuotationItem

SalesOrder
SalesOrderItem

DeliveryNote
DeliveryNoteItem

CustomerInvoice
CustomerInvoiceItem

SalesReturn
SalesReturnItem

CustomerPayment
```

---

## Finance

```
SupplierPayment

CashAccount

CashTransaction

JournalEntry
```

---

# Database Overview

```
Core
│
├── countries
├── languages
├── currencies
├── exchange_rates
├── tax_rates
├── units
├── packaging_types
├── colors
├── product_types
├── product_categories
├── financial_institutions
├── payment_methods
├── address_types
└── job_titles

Administration
│
├── users
├── roles
├── permissions
├── model_has_roles
├── model_has_permissions
├── role_has_permissions
├── user_sessions
├── audit_logs
├── notifications
└── system_settings

Settings
│
├── companies
└── company_branches

Infrastructure
│
└── warehouses

Catalog
│
├── brands
├── products
└── product_variants

Customers
│
├── customers
├── customer_addresses
├── customer_contacts
└── customer_bank_accounts

Suppliers
│
├── suppliers
├── supplier_addresses
├── supplier_contacts
└── supplier_bank_accounts

Inventory
│
├── stocks
├── stock_movement_types
├── stock_movements
├── stock_counts
├── stock_count_items
├── stock_adjustments
├── stock_adjustment_items
├── stock_transfers
└── stock_transfer_items

Documents
│
├── document_types
├── document_statuses
├── document_sequences
├── documents
├── document_attachments
└── document_comments

Purchasing
│
├── purchase_requests
├── purchase_request_items
├── purchase_orders
├── purchase_order_items
├── purchase_receipts
├── purchase_receipt_items
├── purchase_returns
├── purchase_return_items
├── supplier_invoices
└── supplier_invoice_items

Sales
│
├── quotations
├── quotation_items
├── sales_orders
├── sales_order_items
├── delivery_notes
├── delivery_note_items
├── customer_invoices
├── customer_invoice_items
├── sales_returns
├── sales_return_items
└── customer_payments

Finance
│
├── supplier_payments
├── cash_accounts
├── cash_transactions
└── journal_entries
```

---

# Development Roadmap

- ✅ Business Analysis
- ✅ Technical Architecture
- ✅ MCD
- ✅ MLD
- ✅ Database Design
- ✅ Laravel Migrations
- ⏳ Models
- ⏳ Relationships
- ⏳ Factories
- ⏳ Seeders
- ⏳ Services
- ⏳ Requests
- ⏳ Policies
- ⏳ API Resources
- ⏳ Controllers
- ⏳ Vue.js Pages
- ⏳ Testing
- ⏳ Deployment

---

# Project Status

Current Progress

```
███████████████░░░░░░░░░░░░░░░░

Architecture        ✅
Database            ✅
Migrations          ✅
Models              ⏳
Services            ⏳
Frontend            ⏳
Testing             ⏳
Deployment          ⏳
```

---

# License

Private Project

Copyright © Gabriel Kalala

All rights reserved.
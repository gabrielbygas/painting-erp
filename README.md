# Painting ERP

> Modern ERP for the Paint Industry

---

# Overview

**Painting ERP** is a modern Enterprise Resource Planning (ERP) application designed primarily for paint manufacturers, distributors, wholesalers and retailers.

The application is built using modern technologies with a clean Domain-Driven architecture while keeping the standard Laravel project structure.

The default language is **French**, with full **English** support.

---

# Objectives

* Inventory Management
* Purchasing
* Production
* Sales
* Finance
* Customer Management
* Supplier Management
* Document Management
* Reporting
* Secure Administration

---

# Target Market

Current target:

* Democratic Republic of the Congo 🇨🇩

Future target:

* Africa
* International market

---

# Technology Stack

| Technology        | Version |
| ----------------- | ------- |
| PHP               | 8.4+    |
| Laravel           | 13      |
| Vue.js            | 3       |
| Tailwind CSS      | 4       |
| MySQL             | 8       |
| Vite              | Latest  |
| Laravel Breeze    | Latest  |
| Spatie Permission | Latest  |

---

# Architecture

The project follows a **Domain-Driven ERP Architecture** while keeping the standard Laravel folder structure.

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

# Project Structure

```
Core

Administration

Settings

Catalog

Customers

Suppliers

Inventory

Documents

Purchasing

Production

Sales

Finance
```

---

# Multilingual Strategy

Default language

* French

Supported languages

* English

Database strategy

```
name_fr

name_en
```

The application interface will use Laravel Localization.

---

# Database

Database Engine

* MySQL 8

Primary Key

* UUID

Soft Deletes

* Reference tables only

Naming Convention

* snake_case

Plural table names

Foreign Keys

* foreignUuid()

---

# Security

* Laravel Authentication
* Authorization using Spatie Permission
* Form Request Validation
* CSRF Protection
* SQL Injection Protection
* XSS Protection
* Mass Assignment Protection
* Password Hashing
* Audit Logs
* User Sessions
* Authorization Policies

---

# Development Rules

* Follow Laravel Best Practices
* Thin Controllers
* Business Logic inside Services
* Strict Validation
* API Resources
* No duplicated business logic
* Clean code
* SOLID Principles

---

# Development Roadmap

* ✅ Business Analysis
* ✅ Technical Architecture
* ✅ MCD
* ✅ MLD
* 🔄 Laravel Migrations
* ⏳ Models
* ⏳ Relationships
* ⏳ Factories
* ⏳ Seeders
* ⏳ Services
* ⏳ Requests
* ⏳ Policies
* ⏳ API Resources
* ⏳ Controllers
* ⏳ Vue.js Interface
* ⏳ Testing
* ⏳ Deployment

---

# License

Private Project

Copyright © Gabriel Kalala

All rights reserved.

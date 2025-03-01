# Employee Management System

A Laravel-based web application for managing employees with authentication and role-based permissions.

## Features
- Create, read, update, and delete (CRUD) employees.
- Secure password storage with hashing.
- Pre-seeded admin and employee accounts for testing.
- Role-based access control using Spatie Laravel Permissions.

---
## Infos
- user1 name : Admin 
- user1 pawword : admin123 
- user1 name : Employee 
- user1 pawword : employee123 
- user Employee have access only to the products route so after logging in you will face 403 User does not have the right roles since the use Employee dosn't have the right spatie access


## Prerequisites
- PHP ≥ 8.1
- Composer
- Database (MySQL, PostgreSQL, SQLite, etc.)

---

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/employee-management-system.git
cd employee-management-system

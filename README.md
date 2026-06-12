# 🌾 Agroculture — Database Design

> **Note:** This repository showcases the **database schema and design** for the Agroculture platform. Full application development is not included. The purpose is to demonstrate relational database modeling, normalization, and data architecture skills.

---

## 📌 Project Overview

**Agroculture** is a conceptual farmer-to-buyer e-commerce platform designed to connect farmers directly with consumers. This repo contains the MySQL database schema that powers the core features of the platform, including product listings, user management, cart and transaction handling, and a community blog.

---

## 🗄️ Database Summary

| Property       | Detail             |
|----------------|--------------------|
| **DBMS**       | MySQL 5.7          |
| **Charset**    | UTF-8 (utf8mb4)    |
| **Engine**     | InnoDB             |
| **Tables**     | 8                  |
| **Dump Tool**  | phpMyAdmin 4.6.4   |

---

## 📐 Schema Overview

### Tables

| Table          | Description                                                  |
|----------------|--------------------------------------------------------------|
| `farmer`       | Registered farmers with credentials, contact info, and rating |
| `buyer`        | Registered buyers with credentials and contact info          |
| `fproduct`     | Products listed by farmers (name, category, price, image)    |
| `mycart`       | Shopping cart — maps buyers to selected products             |
| `transaction`  | Completed order records with shipping details                |
| `blogdata`     | Blog posts created by users, with like counts                |
| `blogfeedback` | Comments on blog posts                                       |
| `likedata`     | Tracks which users liked which blog posts                    |

---

## 🔗 Entity Relationships

```
farmer (fid) ──< fproduct (fid)        [One farmer → Many products]
buyer  (bid) ──< mycart   (bid, pid)   [One buyer  → Many cart items]
buyer  (bid) ──< transaction (bid)     [One buyer  → Many transactions]
blogdata (blogId) ──< blogfeedback     [One blog   → Many comments]
blogdata (blogId) ──< likedata         [One blog   → Many likes]
```

> Foreign key constraints are enforced via InnoDB for referential integrity.

---

## 🧩 Key Design Decisions

- **Password hashing** — The `farmer` and `buyer` tables store a `hash` field alongside the password column, indicating a dual-layer credential approach (bcrypt hash observed in sample data).
- **Soft activation** — Both `farmer` and `buyer` have an `active` flag (`factive` / `bactive`) for account verification/activation flow.
- **Profile pictures** — Farmers have `picExt` and `picStatus` fields to manage optional profile image uploads.
- **Product images** — `fproduct` includes `pimage` and `picStatus` for farmer-uploaded product photos.
- **Blog engagement** — Likes are tracked in a separate `likedata` junction table to prevent duplicate likes per user.

---

## 📁 File Structure

```
agroculture.sql   ← Full database dump (schema + seed data)
README.md         ← This file
```

---

## 🚀 Getting Started

To import the database locally:

```bash
# Create the database
mysql -u root -p -e "CREATE DATABASE agroculture;"

# Import the schema and seed data
mysql -u root -p agroculture < agroculture.sql
```

Requirements: MySQL 5.7+ or MariaDB 10.x

---

## ⚠️ Disclaimer

This project is for **academic and portfolio purposes only**. The schema and seed data are used to demonstrate database design concepts. No production application is attached to this repository.

---

## 👤 Author

**Arif** — Computer Science & Engineering Graduate  
[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-blue?style=flat&logo=linkedin)]([https://linkedin.com](https://linkedin.com/in/me-arifur-rahman))

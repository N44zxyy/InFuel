# InFuel - Fuel Delivery Management System

## Overview
InFuel is a collaborative project developed by a team of four during our college years. It is a fully functional fuel delivery management system aimed at optimizing the process of fuel delivery, order processing, and customer management.

## Features
- **Order Processing:** Efficient handling of customer orders for fuel delivery.
- **Delivery Tracking:** Real-time tracking of fuel delivery status.
- **Customer Management:** User-friendly interface for managing customer profiles.

## Technologies Used
- **Backend:** PHP
- **Database:** MySQL

## Getting Started
To run InFuel locally, follow these steps:

### Prerequisites
- XAMPP/WAMP/LAMP installed on your machine.
- PHP and MySQL should be properly configured.

### Installation Steps

1. **Download and Extract:**
   - Download the zip file.
   - Extract the file and copy the `fdondms` folder.

2. **Move to Root Directory:**
   - Paste the `fdondms` folder inside the root directory.
     - For XAMPP: `xampp/htdocs`
     - For WAMP: `wamp/www`
     - For LAMP: `var/www/html`

3. **Database Setup:**
   - Open PHPMyAdmin (http://localhost/phpmyadmin).
   - Create a database with the name `fdondmsdb`.
   - Import `fdondmsdb.sql` file (found inside the zip package in the SQL file folder).

4. **Run the Project:**
   - Open a web browser and navigate to `http://localhost/fdondms` for the frontend.

### Credentials

- **Admin Panel:**
  - Username: admin
  - Password: Test@123

- **Fuel Station Owner Panel:**
  - Username: john12
  - Password: Test@123
  - *Or register a new owner.*

- **User Panel:**
  - Username: rahul12
  - Password: Test@123
  - *Or register a new user.*

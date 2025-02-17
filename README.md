# Eye Bank Management System

## Project Overview
This project is a **PHP-based Eye Donation Management System** that helps in managing eye donors, recipients, and donation records efficiently. The system includes features such as donor registration, recipient management, and database interaction.

## Features
- **Donor Registration:** Allows users to register as eye donors.
- **Recipient Management:** Tracks people in need of donations.
- **Database Integration:** Stores all donor and recipient data securely.
- **User Authentication:** Manages access control.
- **Web Interface:** HTML, CSS, and PHP-based frontend.

## Installation Guide
### Prerequisites
- PHP (>=7.4)
- MySQL Database
- Apache Server (XAMPP, WAMP, or similar)

### Steps
1. **Extract the ZIP File**
   ```bash
   unzip eye-project2-PHP-zip.zip
   ```
2. **Move to Server Directory**
   ```bash
   mv eye-project2-PHP /var/www/html/
   ```
   (For XAMPP: Move the folder to `C:\xampp\htdocs\` on Windows.)

3. **Import Database**
   - Open MySQL or phpMyAdmin.
   - Create a new database (e.g., `eye_donation_db`).
   - Import `eye_project1.sql` into the database.

4. **Configure Database Connection**
   - Open `db.php`.
   - Update database credentials:
     ```php
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "eye_donation_db";
     ```

5. **Run the Project**
   - Start Apache and MySQL.
   - Open a browser and go to:
     ```
     http://localhost/eye-project2-PHP/index.php
     ```

## Usage
- Navigate to the homepage.
- Register as a donor or recipient.
- Manage donation records through the dashboard.

## Folder Structure
```
/eye-project2-PHP/
|-- about.html
|-- addDonor.php
|-- donor.php
|-- db.php
|-- eye_project1.sql
|-- css/
|-- images/
|-- js/
```

## Future Enhancements
- Add email notifications for donors and recipients.
- Improve UI with a modern frontend framework.
- Implement AI-based donor-recipient matching.

## License
This project is open-source. Feel free to modify and use it.


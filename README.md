# 🏨 Hotel Silverpeak Booking System

A web-based hotel reservation platform featuring an elegant frontend user interface, real-time input validation, and a secure PHP backend connected to a MySQL database.

## 🛠️ Tools & Technologies
- **Frontend:** HTML5, CSS3
- **Backend:** PHP (Object-Oriented via MySQLi)
- **Database:** MySQL
- **Environment:** XAMPP Server

## 🚀 Key Features
- **Luxury UI/UX:** Responsive landing page featuring distinct room categories (Standard, Family, Suite) and custom CSS layouts.
- **Smart Form Validation:** Server-side validation inside `booking.php` that blocks past dates and ensures the check-out date is strictly after the check-in date.
- **Secure Database Architecture:** Implemented SQL injection prevention using **Prepared Statements** (`$conn->prepare` and `bind_param`).
- **Relational DB Design:** Structure layout supports relational tables for `rooms`, `bookings`, and `payments`.

## 📁 Project Structure
- `index.html` - The main homepage containing hotel overview, room details, interactive booking form, and embedded contact map.
- `style.css` - Custom style sheets for typography, color palette, and premium hover animations.
- `booking.php` - Server-side validation logic and database entry execution.
- `Hotel_Silverpeak_Presentation (1).pptx` - Official project presentation slides including ER diagrams and database query structures.

## 💻 How to Run Locally
1. Clone or download this repository.
2. Move the project folder into your local server directory (e.g., `C:\xampp\htdocs\`).
3. Open **phpMyAdmin** and create a database named `hotel_db`.
4. Create a table named `bookings` with fields matching your insertion logic (`checkin`, `checkout`, `guests`).
5. Run the XAMPP Control Panel (Start Apache and MySQL).
6. Access the project in your browser via `http://localhost/YOUR_FOLDER_NAME/index.html`.

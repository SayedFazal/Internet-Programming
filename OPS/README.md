# 🗳️ Online Voting System

This project is a **Web-based Online Voting System** built using **PHP, HTML, CSS, and MySQL**.  
It allows **voters** to cast their votes securely and **admins (groups)** to manage the election process and publish results.

---

## 🚀 Features

- User Registration with role selection (Voter / Group).
- Secure Login authentication.
- Upload profile images for voters and groups.
- Cast votes (one vote per user restriction).
- Real-time vote count display with progress bars.
- Admin (Group) can **publish results**.
- Responsive and modern UI with background images.

---

## 📸 Screenshots

### 🔹 Register Page
<img width="800" height="450" alt="image" src="https://github.com/user-attachments/assets/b137a69d-d6ba-4055-a6f8-6238a02b1e6d" />

### 🔹 Login Page
<img width="800" height="450" alt="image" src="https://github.com/user-attachments/assets/4bb07594-cd0e-47f5-8831-84b0878ff04e" />

### 🔹 Dashboard (Voter View)
<img width="800" height="450" alt="image" src="https://github.com/user-attachments/assets/5accb62c-6847-4840-9f5d-94f0f805d152" />

### 🔹 Dashboard (Admin View with Results)
<img width="800" height="450" alt="image" src="https://github.com/user-attachments/assets/6d378e1c-a31c-4ce0-bc76-b4eeda39d7f7" />

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  

---

## ⚙️ Setup Instructions

1. Clone this repository:
2. Move project files to your local server directory (e.g., 'htdocs' for XAMPP).  
3. Create a database 'voting' in MySQL.  
4. Import the provided SQL file ('database.sql') into MySQL.  
5. Update database credentials in 'api/connect.php'.  
6. Start Apache & MySQL from XAMPP and open:
   ```
   http://localhost/OPS
   ```

---

## 👥 Roles

- **Voter:** Can log in, view groups, and cast one vote.  
- **Group (Admin):** Can log in, view vote statistics, and publish the winner.  

---

## 📊 Result Display

- Votes are counted live with progress bars.  
- Once the admin publishes results, a popup shows the winner.  

---

## 📄 License

This project is licensed under the **MIT License** – feel free to use and modify.

---

### ✨ Developed for Educational Purposes

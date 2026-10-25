# 🚀 Velox Blog Application (PHP & MySQL)

A dynamic, multi-page full-stack blogging platform built with **PHP**, **MySQL**, and styled with **Tailwind CSS**. This project features user authentication, a secure database-backed session system, an author dashboard, and real-time public article publishing.

---

## 🛠️ Tech Stack & Architecture

- **Backend / Server**: PHP (with MySQLi database connection)
- **Database**: MySQL (Auto-configured database and tables via `db.php`)
- **Frontend**: Tailwind CSS (via CDN) and HTML5
- **Environment**: WampServer / XAMPP (Local Apache server)

---

## 📁 Project Directory Structure

```text
blog-app/
├── css/                 # Custom CSS stylesheets
├── js/                  # JavaScript files
├── public/              # Public asset files
├── db.php               # Database connection and auto-setup script
├── index.php            # Main public feed and article viewer
├── login.php            # User login and session initialization
├── register.php         # User account registration
├── dashboard.php        # Author management dashboard
├── create-blog.php      # Story authoring and publishing page
├── .gitignore           # Git ignore rules
└── README.md            # Project documentation

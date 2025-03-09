# Todo List - CodeIgniter 4

## 📌 Project Description

This project is a simple Todo List application built using CodeIgniter 4. The application allows users to manage task lists with specific categories.

## 🛠️ Technologies Used

- **CodeIgniter 4** - PHP Framework
- **Bootstrap 5.3.3** - For UI design
- **jQuery** - For DOM manipulation
- **SweetAlert2** - For notifications and confirmations
- **DataTables (datatables.net-bs5)** - For displaying data in an interactive table format

## 📂 Database Structure

This application uses two main tables:

### 1. **`categories` Table**

Used to store task categories.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
name (VARCHAR 100, NOT NULL)
created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
```

### 2. **`tasks` Table**

Used to store the task list.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
title (VARCHAR 255, NOT NULL)
description (TEXT, NULL)
due_date (DATE, NOT NULL)
status (ENUM('Not Completed', 'Completed'), DEFAULT 'Not Completed')
category_id (INT, NULL, FOREIGN KEY to categories.id)
created_at (TIMESTAMP, DEFAULT CURRENT_TIMESTAMP)
```

## ⚙️ Installation & Configuration

1. **Clone this repository**

   ```sh
   git clone https://github.com/RyanGA09/ci4-todolist-bootstrap.git
   ```

   ```sh
   cd todo-list-ci4
   ```

2. **Install dependencies using Composer**

   ```sh
   composer install
   ```

3. **Configure `.env`**

   - Rename the file `.env.example` to `.env`
   - Adjust the database configuration:

     ```ini
     database.default.hostname = localhost
     database.default.database = database_name
     database.default.username = root
     database.default.password =
     database.default.DBDriver = MySQLi
     ```

4. **Run database migration**

   ```sh
   php spark migrate
   ```

5. **Run the seeder to populate initial data**

   ```sh
   php spark db:seed DatabaseSeeder
   ```

6. **Start the application**

   ```sh
       php spark serve
   ```

7. **Access via browser**

   ```
           http://localhost:8080
   ```

## ✨ Features

- Add, edit, and delete tasks
- Filter tasks by category
- Change task status (Not Completed / Completed)
- Notifications using SweetAlert2
- Interactive tables with DataTables

## 🖼️ Application UI

The application uses Bootstrap 5 for a modern and responsive design.

## 📜 License

This project is open-source and free to use.

---

🚀 **Happy coding!**

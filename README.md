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
created_at (DATETIME, NULL)
```

### 2. **`priorities` Table**

Used to store task priorities.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
priority_level (INT, NOT NULL, 1 to 5)
description (VARCHAR 255, NOT NULL)
created_at (DATETIME, NULL)
```

### 3. **`tasks` Table**

Used to store the task list.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
title (VARCHAR 255, NOT NULL)
description (TEXT, NULL)
due_date (DATETIME, NOT NULL)
status (ENUM('Not Completed', 'Completed'), DEFAULT 'Not Completed')
category_id (INT, NULL, FOREIGN KEY to categories.id)
priority_id (INT, NULL, FOREIGN KEY to priorities.id)
created_at (DATETIME, NULL)
```

### 4. **`subtasks` Table**

Used to store subtasks for each task.

```sql
id (INT, PRIMARY KEY, AUTO_INCREMENT)
task_id (INT, FOREIGN KEY to tasks.id)
title (VARCHAR 255, NOT NULL)
status (ENUM('Not Completed', 'Completed'), DEFAULT 'Not Completed')
created_at (DATETIME, NULL)
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

   ```sh
   http://localhost:8080
   ```

## ✨ Features

- Add, edit, and delete tasks
- Filter tasks by category
- Change task status (Not Completed / Completed)
- Manage subtasks for each task
- Notifications using SweetAlert2
- Interactive tables with DataTables

## 🖼️ Application UI

The application uses Bootstrap 5 for a modern and responsive design.

## 📜 License

[MIT LICENSE](LICENSE)

&copy;2025 Ryan Gading Abdullah. All rights reserved.

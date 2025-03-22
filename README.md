# php-todo

learning php. this uses mysql as the database

## getting started

### after cloning, inside the php-todo directory, run php server

```bash
php -S 127.0.0.1:8080 -t public
```

### make sure you create the db

```sql
-- create the database
mysql -u root -p -e "CREATE DATABASE todo_db"

```

### create mysql user

it is recommended to create a new user other than root in mysql for security

```sql
-- create the user
mysql -u root -p -e "CREATE USER 'todo_user'@'localhost' IDENTIFIED BY 'password'"

-- add privileges to the created user to access
mysql -u root -p -e "GRANT ALL PRIVILEGES ON todo_db.* TO 'todo_user'@'localhost';"

-- apply privileges
mysql -u root -p -e "FLUSH PRIVILEGES"
```

> [!IMPORTANT]
> i use linux. some things might not work in windows/mac im sorry

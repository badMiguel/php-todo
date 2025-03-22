# php-todo

learning php. this uses mysql as the database

## getting started

> [!IMPORTANT]
> i use linux. some things might not work in windows/mac im sorry

### run php server

after cloning, run the command inside the php-todo directory...

```bash
php -S 127.0.0.1:8080 -t public
```

**on windows**

if you get the following error php is likely not in envrionment variables:

```
'php' is not recognized as an internal or external command,
operable program or batch file.
```

you can either setup apache instead of running the php command, or
if you installed php through xampp, open command prompt **as administrator**

```
setx PATH "%PATH%;C:\xampp\php" /M
```

close and reopen command prompt and verify php is now in env variable:

```
php -v
```

---

### make sure you create the db

```sql
-- create the database
mysql -u root -p -e "CREATE DATABASE todo_db"
```

> [!NOTE]
> if you did not set up a password just press enter

**on windows**

if using xampp, make sure to enable mysql on xampp control panel

similar to above, if you get the following error mysql is likely not in envrionment variables:

```
'mysql' is not recognized as an internal or external command,
operable program or batch file.
```

if you installed mysql through xampp, open command prompt as administrator

```
setx PATH "%PATH%;C:\xampp\mysql\bin" /M
```

close and reopen command prompt and verify mysql is now in env variable:

```
mysql --version
```

---

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

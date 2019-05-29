### Create database table

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL UNIQUE,
  `user_perm` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `logged_by` varchar(100) NOT NULL
);
```

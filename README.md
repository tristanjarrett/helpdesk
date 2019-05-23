### Create database table

```sql
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
);
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `type` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
);
```

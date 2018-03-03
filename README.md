# Pastify
### Paste whatever you need to the following box and share with your friends.

1. Please run the following SQL query to structure the database:
```
CREATE TABLE 'DOCUMENTS' (
  'id' varchar(64) NOT NULL,
  'content' longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  'creation_date' datetime NOT NULL,
  'days_to_persist' int(11) NOT NULL DEFAULT '30'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE 'DOCUMENTS'
  ADD PRIMARY KEY ('id');
```

2. Set up a daily cron job to delete all entries where $days_to_persist + $creation_date is older than $today.
  * Another way would be to run that query each time we create new entry but that wouldn't scale.

-- parent table

CREATE TABLE users (
  id INT(11) NOT NULL AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(30) NOT NULL,
  pwd VARCHAR(255) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIME,
  PRIMARY KEY (id)
);

-- child table
CREATE TABLE todos (
  id INT(11) NOT NULL AUTO_INCREMENT,
  todo_text TEXT NOT NULL,
  checked TINYINT(1) DEFAULT 0,
  users_id INT(11),
  FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE,
  PRIMARY KEY (id)
);
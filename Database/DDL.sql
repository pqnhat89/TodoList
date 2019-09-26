DROP TABLE Work;

CREATE TABLE Work
(
  work_id    INT(10) AUTO_INCREMENT PRIMARY KEY,
  work_name  varchar(256)                         NOT NULL,
  start_date TIMESTAMP                            NOT NULL,
  end_date   TIMESTAMP                            NOT NULL,
  status     TINYINT(1) default 0                 NOT NULL,
  created_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP NOT NULL,
  updated_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP NOT NULL,
  is_deleted TINYINT(1) default 0                 NOT NULL
);
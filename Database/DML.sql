TRUNCATE TABLE Work;

INSERT INTO Work(word_name, start_date, end_date)
VALUES ('Word name 1', NOW(), DATE_ADD(NOW(), INTERVAL 1 DAY)),
       ('Word name 2', NOW(), DATE_ADD(NOW(), INTERVAL 2 DAY)),
       ('Word name 3', NOW(), DATE_ADD(NOW(), INTERVAL 3 DAY)),
       ('Word name 4', NOW(), DATE_ADD(NOW(), INTERVAL 4 DAY)),
       ('Word name 5', NOW(), DATE_ADD(NOW(), INTERVAL 5 DAY));
CREATE DATABASE IF NOT EXISTS test;
USE test;


CREATE TABLE IF NOT EXISTS test_users (
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(32) NOT NULL,
surname VARCHAR(32) NOT NULL,
email VARCHAR(32) NOT NULL,
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS test_posts (
id INT(11) NOT NULL AUTO_INCREMENT,
userId INT(11) NOT NULL,
theme VARCHAR(32) NOT NULL,
name VARCHAR(32) NOT NULL,
text LONGTEXT NOT NULL,
PRIMARY KEY(id)
);

INSERT INTO test_users (id, name, surname, email, password) VALUES
(0, 'admin@', '-', 'admin@email.com', '$2y$10$Ho/Vqiz2wN9R2C1pfqA9Nua6iXo9DkzhomM4mR/kt8TE36ckQXaDy');

INSERT INTO test_users (id, name, surname, email, password) VALUES
(0, '-', '-', '123@123', '$2y$10$5ZK1I1s1TQiPxt0bK8u6fenisVCQ64AerB4BS3M4p8Y6SRyPiJ1Ka');

INSERT INTO test_posts (id, userId, theme, name, text) VALUES
(0, 1, 'Без темы', 'Восток', 'Восток — серия советских одноместных пилотируемых космических кораблей для осуществления полётов по околоземной орбите с катапультированием и посадкой космонавта на парашюте отдельно от спускаемого аппарата, создававшаяся в Особом конструкторском бюро № 1 (ОКБ-1) под руководством главного конструктора Сергея Павловича Королёва с 1958 по 1963 годы. Первый пилотируемый космический корабль серии «Восток», запуск которого состоялся 12 апреля 1961 года с космодрома «Байконур» с лётчиком-космонавтом Юрием Алексеевичем Гагариным на борту, стал одновременно и первым в мире космическим аппаратом, позволившим осуществить первый полёт человека в космическое пространство. Этот день, 12 апреля, с 1962 года ежегодно отмечался в СССР как День космонавтики. С 1970 года в этот же день во многих других странах мира отмечается Всемирный день авиации и космонавтики. В Российской Федерации День космонавтики ежегодно отмечается с 1995 года в качестве памятной даты. В последующем совершили полёты ещё пять космических кораблей серии «Восток», в том числе два групповых (без стыковки), в том числе с первой в мире женщиной-космонавтом Валентиной Владимировной Терешковой на борту. Планировавшиеся ещё четыре полёта (в том числе более длительные, с созданием искусственной гравитации) были отменены.');
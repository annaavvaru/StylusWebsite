CREATE TABLE technologies (
	javaScript VARCHAR(128),
    front_end_Frameworks VARCHAR(128),
    web_applications VARCHAR(128),
    programming_languages VARCHAR(128),
    data_bases VARCHAR(128),
    web_servers VARCHAR(128),
    id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY) ENGINE MyISAM;
DESCRIBE technologies;


INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications, programming_languages, data_bases, web_servers)
VALUES ('jQuery','Bootstrap','Ruby','PHP','MariaDB','Apache HTTP server');

INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications, programming_languages, data_bases, web_servers)
VALUES  ('React','Semantic UI','Express','Python','MySQL','Apache Tomcat');

INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications, programming_languages, data_bases, web_servers)
VALUES  ('D3.js','Uikit','Ember.Js','JAVA',' MongoDB','NGINX');

INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications, programming_languages, data_bases, web_servers)
VALUES  ('Moment.js','Foundation','ASP.net','Scala','PostgreSQ','Node.js');

INSERT INTO technologies (javaScript, front_end_Frameworks, web_applications, programming_languages, data_bases, web_servers)
VALUES ('Backbone.js','HTML5','AngularJS','Rust','Redis','Lighttpd');

select * from technologies;
/*
CREATE TABLE classics (author VARCHAR(128), title VARCHAR(128), type VARCHAR(16), year CHAR(4), id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY) ENGINE MyISAM;
DESCRIBE classics;
INSERT INTO classics (author, title, type, year) VALUES('Mark Twain','The Adventures of Tom Sawyer','Fiction','1876');INSERT INTO classics(author, title, type, year) VALUES('Jane Austen','Pride and Prejudice','Fiction','1811');INSERT INTO classics(author, title, type, year) VALUES('Charles Darwin','The Origin of Species','Non-Fiction','1856');INSERT INTO classics(author, title, type, year) VALUES('Charles Dickens','The Old Curiosity Shop','Fiction','1841');INSERT INTO classics(author, title, type, year) VALUES('William Shakespeare','Romeo and Juliet','Play','1594');
DESCRIBE classics;
ALTER TABLE classics ADD isbn CHAR(13);UPDATE classics SET isbn='9781598184891' WHERE year='1876';UPDATE classics SET isbn='9780582506206' WHERE year='1811';UPDATE classics SET isbn='9780517123201' WHERE year='1856';UPDATE classics SET isbn='9780099533474' WHERE year='1841';UPDATE classics SET isbn='9780192814968' WHERE year='1594';
DESCRIBE classics;
SELECT author FROM classics;
SELECT DISTINCT author FROM classics;
SELECT author, title FROM classics
SELECT author, title FROM classics WHERE author="Mark Twain";
SELECT author, title FROM classics WHERE isbn="9781598184891";
*/

create database music character set utf8;
use music;
drop database music;

create table song(
	songid int primary key auto_increment,
	songname varchar(60),
  banner varchar(100),
  userid int
);

-- Procedure for pagination

CREATE PROCEDURE getSongsWithLimit(start int, perpage int)
BEGIN
	SELECT * FROM song
    limit start, perpage;

CREATE PROCEDURE getSongsWithLimitSearch(start int, perpage int, name varchar(10))
BEGIN
	SELECT * FROM song
	WHERE songname LIKE '%name%'
    limit start, perpage;

drop procedure getSongsWithLimitSearch;

-- New one

	CREATE PROCEDURE getSongsWithLimitSearch(start int, perpage int, name varchar(60))
	BEGIN
		SELECT * FROM song
		WHERE songname LIKE @name
	    limit start, perpage;

CALL getSongsWithLimit(4, 2);

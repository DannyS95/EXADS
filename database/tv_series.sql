CREATE TABLE tv_series (
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    channel varchar(100),
    gender varchar(100),
    PRIMARY KEY (ID)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

CREATE TABLE tv_series_intervals (
    id_tv_series INT UNSIGNED NOT NULL,
    week_day INT UNSIGNED NOT NULL,
    show_time TIME NOT NULL
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;


INSERT INTO tv_series (title,channel,gender) VALUES 
('dragons','dark-fantasy','action, thrill'),
('space exploring','science awesome','sci-fi, action'),
('love begins','love cost','romance, drama');

INSERT INTO tv_series_intervals (id_tv_series,week_day,show_time) VALUES 
(1,2,TIME("22:30:10") ),
(1,6,TIME("21:15:10") ),
(1,4,TIME("12:45:10") ),
(3,5,TIME("18:30:10") ),
(2,3,TIME("14:20:10") ),
(2,3,TIME("16:10:10") );
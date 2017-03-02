CREATE TABLE IF NOT EXISTS publisher (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(50),
    PRIMARY KEY (id),
    UNIQUE (email)
    );

CREATE TABLE IF NOT EXISTS movie (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    pid INT UNSIGNED NOT NULL
    name VARCHAR(32) NOT NULL,
    release_date  timestamp NOT NULL default CURRENT_TIMESTAMP
    PRIMARY KEY (id),
    FOREIGN KEY (pid) REFERENCES publisher(id),
    INDEX (pid)
    );

CREATE TABLE IF NOT EXISTS subscriber (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    phone VARCHAR(50),
    PRIMARY KEY (id),
    UNIQUE (email)
    );

CREATE TABLE IF NOT EXISTS notification (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    sid INT UNSIGNED NOT NULL,
    mid INT UNSIGNED NOT NULL,
    PRIMARY KEY (id),
    UNIQUE (sid,mid)
    INDEX (sid,mid)
    );

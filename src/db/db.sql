CREATE DATABASE players_db;
USE players_db;

-- Create Nationalities Table
CREATE TABLE nationalities (
    nationalite_id INT AUTO_INCREMENT,
    nationalite_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (nationalite_id)
);

-- Create Clubs Table
CREATE TABLE clubs (
    club_id INT AUTO_INCREMENT,
    club_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (club_id)
);

-- Create Leagues Table
CREATE TABLE leagues (
    league_id INT AUTO_INCREMENT,
    league_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (league_id)
);

-- Create Player Table
CREATE TABLE player (
    player_id INT AUTO_INCREMENT,
    first_name VARCHAR(30) NOT NULL,
    last_name VARCHAR(30) NOT NULL,
    position ENUM(
        'GK',
        'RB',
        'CRB',
        'CLB',
        'LB',
        'RM',
        'CM',
        'LM',
        'RW',
        'AT',
        'LW'
    ) NOT NULL,
    nationalite_id INT,
    league_id INT,
    club_id INT,
    PRIMARY KEY (player_id),
    FOREIGN KEY (nationalite_id) REFERENCES nationalities (nationalite_id),
    FOREIGN KEY (league_id) REFERENCES leagues (league_id),
    FOREIGN KEY (club_id) REFERENCES clubs (club_id)
);

-- Create Goalkeeper Stats Table
CREATE TABLE goalkeeper_stats (
    player_id INT PRIMARY KEY,
    rating TINYINT UNSIGNED,
    diving TINYINT UNSIGNED,
    handling TINYINT UNSIGNED,
    kicking TINYINT UNSIGNED,
    positioning TINYINT UNSIGNED,
    reflexes TINYINT UNSIGNED,
    speed TINYINT UNSIGNED,
    FOREIGN KEY (player_id) REFERENCES player (player_id)
);

-- Create Outfield Player Stats Table
CREATE TABLE outfield_player_stats (
    player_id INT PRIMARY KEY,
    rating TINYINT UNSIGNED,
    pace TINYINT UNSIGNED,
    shooting TINYINT UNSIGNED,
    passing TINYINT UNSIGNED,
    dribbling TINYINT UNSIGNED,
    defending TINYINT UNSIGNED,
    physical TINYINT UNSIGNED,
    FOREIGN KEY (player_id) REFERENCES player (player_id)
);

-- Insert Nationalities
INSERT INTO nationalities (nationalite_name) VALUES 
('Brazil'),
('Germany'),
('France'),
('Spain'),
('England'),
('Argentina'),
('Netherlands'),
('Portugal');

-- Insert Clubs
INSERT INTO clubs (club_name) VALUES
('Real Madrid'),
('Barcelona'),
('Bayern Munich'),
('Liverpool'),
('Paris Saint-Germain'),
('Manchester City'),
('Juventus'),
('Manchester United');

-- Insert Leagues
INSERT INTO leagues (league_name, club_id) VALUES
('La Liga', 1),
('La Liga', 2),
('Bundesliga', 3),
('Premier League', 4),
('Ligue 1', 5),
('Premier League', 6),
('Serie A', 7),
('Premier League', 8);

-- Insert Players
INSERT INTO player (first_name, last_name, position, nationalite_id, league_id) VALUES
('Lionel', 'Messi', 'RW', 6, 1),
('Cristiano', 'Ronaldo', 'LW', 8, 7),
('Kylian', 'Mbappé', 'AT', 3, 5),
('Robert', 'Lewandowski', 'AT', 2, 3),
('Kevin', 'De Bruyne', 'CM', 2, 6),
('Virgil', 'Van Dijk', 'CRB', 7, 4),
('Neymar', 'Jr', 'LW', 1, 5),
('Harry', 'Kane', 'AT', 5, 8);

-- Insert Goalkeeper Stats
INSERT INTO goalkeeper_stats (player_id, rating, diving, handling, kicking, positioning, reflexes, speed) VALUES
(1, 85, 82, 87, 75, 88, 90, 60);

-- Insert Outfield Player Stats
INSERT INTO outfield_player_stats (player_id, rating, pace, shooting, passing, dribbling, defending, physical) VALUES
(1, 93, 85, 92, 90, 95, 45, 70),
(2, 91, 84, 93, 83, 88, 40, 78),
(3, 91, 93, 85, 82, 87, 45, 76),
(4, 90, 75, 92, 82, 84, 55, 85),
(5, 91, 76, 85, 94, 86, 68, 78),
(6, 89, 76, 65, 82, 75, 92, 90),
(7, 90, 87, 84, 83, 92, 52, 74),
(8, 89, 80, 90, 83, 81, 65, 85);
<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "players_db";
$conn = "";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT 
    p.player_id,
    p.first_name,
    p.last_name,
    p.position,
    n.nationalite_name AS nationality,
    l.league_name,
    c.club_name,
    CASE 
        WHEN gk.player_id IS NOT NULL THEN 'Goalkeeper'
        ELSE 'Outfield Player'
    END AS player_type,
    COALESCE(gk.rating, ops.rating) AS player_rating,
    gk.diving,
    gk.handling,
    gk.kicking,
    gk.positioning,
    gk.reflexes,
    gk.speed,
    ops.pace,
    ops.shooting,
    ops.passing,
    ops.dribbling,
    ops.defending,
    ops.physical
FROM 
    player p
INNER JOIN 
    nationalities n ON p.nationalite_id = n.nationalite_id
INNER JOIN 
    leagues l ON p.league_id = l.league_id
INNER JOIN 
    clubs c ON l.club_id = c.club_id
LEFT JOIN 
    goalkeeper_stats gk ON p.player_id = gk.player_id
LEFT JOIN 
    outfield_player_stats ops ON p.player_id = ops.player_id;";
$result = $conn->query($sql);
$conn->close();
?>
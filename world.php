<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$lookup = $_GET['lookup'] ?? null;
$country = $_GET['country'] ?? '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if ($lookup === 'cities') {
    // Query for cities based on country
    $stmt = $conn->prepare("
        SELECT cities.name AS city, cities.district, cities.population 
        FROM cities 
        JOIN countries ON cities.country_code = countries.code 
        WHERE countries.name LIKE :country
    ");
    $stmt->execute([':country' => "%$country%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output cities in a table
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>District</th><th>Population</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>{$row['city']}</td>";
        echo "<td>{$row['district']}</td>";
        echo "<td>{$row['population']}</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Query for countries based on name
    $stmt = $conn->prepare("
        SELECT name, continent, independence_year, head_of_state 
        FROM countries 
        WHERE name LIKE :country
    ");
    $stmt->execute([':country' => "%$country%"]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output countries in a table
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Continent</th><th>Independence Year</th><th>Head of State</th></tr>";
    foreach ($results as $row) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['continent']}</td>";
        echo "<td>{$row['independence_year']}</td>";
        echo "<td>{$row['head_of_state']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

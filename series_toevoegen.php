<?php 
$host = '127.0.0.1';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
<a href="index.php">Terug</a>
<form action="series_toevoegen.php" method="post">
    <h1>Serie toevoegen:</h1>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Titel-</h2><input type="text" name="title" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Rating-</h2><input type="text" name="rating" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Awards-</h2><input type="text" name="has_won_awards" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Seizoen-</h2><input type="text" name="seasons" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Country-</h2><input type="text" name="country" id=""></div><br>
    <div style="display: flex; align-items:center; height: 20px;"><h2>Language-</h2><input type="text" name="language" id=""></div><br>
    <div style="display: flex; align-items:center; height: 50px;"><h2>Omschrijving-</h2><textarea rows="4" cols="50" type="text" name="description" id=""></textarea></div><br>
    <button type="submit" name="submit">Toevoegen</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    $has_won_awards = $_POST['has_won_awards'];
    $seasons = $_POST['seasons'];
    $country = $_POST['country'];
    $language = $_POST['language'];
    $description = $_POST['description'];

    $sql = "INSERT INTO series(title, rating, has_won_awards, seasons, description, language, country) VALUES (?,?,?,?,?,?,?); ";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$title, $rating, $has_won_awards, $seasons, $description, $language, $country]);
}
?>
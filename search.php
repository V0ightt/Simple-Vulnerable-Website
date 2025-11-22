<?php
// search.php
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Search Users</h2>
    <form method="GET" action="">
        Search: <input type="text" name="query">
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['query'])) {
        $search_query = $_GET['query'];
        
        // VULNERABILITY: Reflected XSS
        // The input is echoed back without htmlspecialchars() or sanitization
        // An attacker can input "<script>alert('Hacked')</script>"
        echo "<div>Results for: " . $search_query . "</div>"; 
    }
    ?>
</body>
</html>

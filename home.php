<?php

//session elindítása --kesz
session_start();

//import -- kesz
include_once "Adatbazis.php";

//új felhasználó -- kesz
$felh = new User();

//megfelelő session leolvasása (felhAzon lekérdezése)
if(!isset($_SESSION['felhAzon'])) {
    //ha nincs bejelentkezve a felhasználó, akkor a bejelentkezéshez ugorjon!
    header("Location: login.php");
    exit;
}

//url-ben állapottartás: ha rákattintott a kijelentkezésre, akkor
if(isset($_GET['logout'])) {
    //kijelentkeztetés után ugorjon a bejelentkezés oldalra!
    session_destroy();
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="hu-HU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home page</title>
    </head>
    <body>
        <main>
            <div>
				<!--üdvözlés névvel-->
                <h1>Hello <?php $felh->get_nev($felhAzon); ?>!</h1>
            </div>
			<div>
				<!--url-ben állapottartás: link a kijelentkezésre-->
                <?php if(isset($_SESSION['felhAzon'])) : ?>
                <a href="index.php?logout=1">Kijelentkezés</a>
                <?php endif; ?>
			</div>
			<?php
				//ha admin a felh-ó, akkor megjelenítjük a bej-tt felh-kat
                if($felh->is_admin()) {
                    // Retrieve logged-in users
                    $logged_in_users = $felh->get_logged_in_users();
                
                    // Display the list of logged-in users
                    if(!empty($logged_in_users)) {
                        echo "<div>";
                        echo "<h2>Logged-in users:</h2>";
                        echo "<ul>";
                        foreach($logged_in_users as $user) {
                            echo "<li>" . $user['name'] . "</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                    } else {
                        echo "<div>No users are currently logged in.</div>";
                    }
                }
			?>
        </main>
    </body>
</html>
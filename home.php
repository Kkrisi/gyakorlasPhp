<?php
//session elindítása
session_start();
//import

//új felhasználó
//megfelelő session leolvasása (felhAzon lekérdezése)

//ha nincs bejelentkezve a felhasználó, akkor a bejelentkezéshez ugorjon!

//url-ben állapottartás: ha rákattintott a kijelentkezésre, akkor
//kijelentkeztetés után ugorjon a bejelentkezés oldalra!
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
			</div>
			<?php
				//ha admin a felh-ó, akkor megjelenítjük a bej-tt felh-kat
			?>
        </main>
    </body>
</html>
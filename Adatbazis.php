<?php
	class User{
		private $host="localhost";
		private $felhasznalonev="root";
		private $jelszo="";
		private $abNev="pizzahot";
		private $kapcsolat;
		
		//Gergo
		//konstuktor
		public function __construct() {	
		
		$this->kapcsolat = new mysql(
			$this->host,
			$this->felhasznaloNev,
			$this->jelszo,
			$this->adatbazis
		);
	
		//ékezetes betűk
		$this->kapcsolat->query("SET NAMES UTF8");
		}

		public function reg_felhasznalo($nev, $email, $jelszo){
			//jelszó titkosítása
			$jelszo = md5($jelszo);
			//lekérdezem a felhasznalo adatai alapján, létezik-e már?
			$select1="SELECT * FROM felhasznalo WHERE nev='$nev' OR email='$email'";
			//ha nem, felveszem/beszúrom a táblába az adatait; szerkesztő lesz alapból, és a bejelentkezett mező 0
			if ($felhasznalonev) {
				# code...
			}
			$felhasznalonev=$this->kapcsolat->querry($select1);
				//visszatérek a lekérdezés eredményével (sikerült-e beszúrni)
			//különben hamis
		}

		
		public function bejelentkezes($nev, $email, $jelszo){
			//jelszó titkosítása
			$jelszo = md5($jelszo);
			//lekérdezés: email vagy nev a megadott érték
			$select1="SELECT = FROM felhasznalo WHERE nev = '$nev' OR email = '$email'";
			//ha már létezik, 
				//állítsuk be a login kulcsot a sessionben igazra,
				//hozzuk létre a felhAzon kulcsú sessiont,
					//segítség:  $result->fetch_array(MYSQLI_ASSOC);
				//módosítsuk a bejelentkezést 1-re! térjünk vissza igazzal!
			//különben hamissal térjünk vissza!
    	}

    	




		
    	//--------- Kristof innentől -----------
    	public function get_nev($felhAzon){
    		//felhAzon alapján név visszaadása
			//$result->fetch_array(MYSQLI_ASSOC);
    	}
		
		public function adminE($felhAzon){
    		//lekérdezés
    	}

	    public function kijelentkezes() {
			$felhAzon = $_SESSION['felhAzon'];
			//módosítsd a bejelentkezett mezőt 0-ra!
			$update2 = "UPDATE felhasznalo SET bejelentkezett = 0 WHERE felhAzon = $felhAzon";
			$result = $this->lekerdezes($update2);
	        //állítsd a session login kulcsát hamisra!
			$_SESSION['login'] = FALSE;
	        //állítsd le a sessiont!
			session_destroy();
	    }
		
		public function aktivok(){
			//lekérdezés
			$sql = "SELECT $oszlop FROM $tabla";
        	return $this->kapcsolat->query($sql);

			//htmlbe majd ezt kell írni --> $matrix = $adatbazis->adatLeker("kep", "szin");
		}
		
		public function megjelenit_aktivok($matrix){
			//listázza az eredményt
			echo "<tr><th>Aktívak:</th></tr>";
			while ($sor = $matrix->fetch_row()) {
				echo "<tr><td>$sor[0]</td></tr>";
			}
			echo "</table>";
		}
	}
?>

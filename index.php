<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep dla uczniów</title>
    <link href="styl.css" rel="stylesheet">
</head>
<body>
    <div class="baner">
        <h1>Dzisiejsze promocje naszego sklepu</h1>
    </div>
    <div class="lewy">
        <h2>Taniej o 30%</h2>
        <ol>
            <?php
            $lacz = mysqli_connect('localhost','root','','sklep');
            $pyt = "SELECT `nazwa` FROM `towary` WHERE `promocja` = 1;";
            $wyn = mysqli_query($lacz, $pyt);
            while($row = mysqli_fetch_array($wyn)){
                echo "<li>".$row[0]."</li>";
            }
            mysqli_close($lacz);
            ?>
        </ol>
    </div>
    <div class="srodkowy">
        <h2>Sprawdź cenę</h2>
        <form action="index.php" method="post">
            <select name="rozw">
                <option value="7">Gumka do mazania</option>
                <option value="8">Cienkopis</option>
                <option value="9">Pisaki 60 szt.</option>
                <option value="10">Markery 4szt.</option>
            </select>
            <input type="submit" value="Sprawdź">
        </form>
        <div class="blok_dzialania">
            <?php
            $lacz = mysqli_connect('localhost','root','','sklep');
            if(!empty( $_POST['rozw'])){
                $wy = $_POST['rozw'];
                $pyt = "SELECT `cena` FROM `towary` WHERE `id` = $wy;";
                $wyn = mysqli_query($lacz, $pyt);
                while($row = mysqli_fetch_array($wyn)){
                    echo "cena regularna: ".$row[0]."<br>";
                    echo "cena w promocji 30%: ".$row[0] - ($row[0]*0.3);
                }
            }
            mysqli_close($lacz);
            ?>
        </div>
    </div>
    <div class="prawy">
        <h2>Kontakt</h2>
        <p>e-mail: <a href="bok@sklep.pl">bok@sklep.pl</a></p>
        <img src="promocja.png" alt="promocja">
    </div>
    <div class="stopka">
        <h4>Autor strony: Martyna Borowska</h4>
    </div>
</body>
</html>
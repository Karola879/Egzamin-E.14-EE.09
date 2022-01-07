<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <title>Rozgrywki futbolowe</title>
        <link rel="stylesheet" type="text/css" href="styl.css">
    </head>
    <body>
        <section id="baner">
            <h2>Światowe rozgrywki piłkarskie</h2>
            <img src="obraz1.jpg" alt="boisko">
        </section>
        <section id="bloki">
            <?php
                $c=new mysqli('localhost','root','','egzamin');
                $q=$c->query("SELECT zespol1, zespol2, wynik, data_rozgrywki FROM rozgrywka WHERE zespol1='EVG'");
                while(($tab=$q->fetch_assoc())!=0){
                    print("<section id=\"blok_w_php\">
                    <h3>".$tab['zespol1']." - ".$tab['zespol2']."</h3>
                    <h4>".$tab['wynik']."</h4>
                    <p>w dniu ".$tab['data_rozgrywki']."</p></section>");
                }
                $c->close();
            ?>
        </section>
        <section id="blok_glowny">
            <h2>Reprezentacja Polski</h2>
        </section>
        <section id="dwa">
            <section id="lewy">
                <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):</p>
                <form method="post" action="futbol.php">
                    <input type="number" name="pozycja">
                    <input type="submit" value="Sprawdź">
                </form>
                <ul>
                    <?php
                        if(isset($_POST['pozycja'])){
                            $c=new mysqli('localhost','root','','egzamin');
                            $poz=$_POST['pozycja'];
                            $q=$c->query("SELECT imie, nazwisko FROM zawodnik inner join pozycja 
                            on zawodnik.pozycja_id=pozycja.id WHERE pozycja_id='$poz'");
                            while(($tab=$q->fetch_assoc())!=0){
                                print("<li>".$tab['imie']." ".$tab['nazwisko']."</li>");
                            }
                            $c->close();
                        }   
                    ?>
                </ul>
            </section>
            <section id="prawy">
                <img src="zad1.png" alt="piłkarz">
                <p>Autor: Karolina Kamela</p>
            </section>
        </section>
    </body>
</html>
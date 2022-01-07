<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>piłka nozna</title>
        <link rel="stylesheet" type="text/css" href="styl2.css">
    </head>
    <body>
        <section id="baner">
            <h3>Reprezentacja polski w piłce nożnej</h3>
            <img src="obraz1.jpg" alt="reprezentacja">
        </section>
        <section id="bloki">
            <section id="lewy">
                <form method="post" action="liga.php">
                    <select name="pozycja">
                        <option value="1">Bramkarze</option>
                        <option value="2">Obrońcy</option>
                        <option value="3">Pomocnicy</option>
                        <option value="4">Napastnicy</option>
                    </select>
                    <input type="submit" value="Zobacz">
                </form>
                <img src="zad2.png" alt="piłka">
                <p>Autor: 00000000000</p>
            </section>
            <section id="prawy">
                <ol>
                    <?php
                        $c=new mysqli('localhost','root','','egzamin');
                        if(isset($_POST['pozycja'])){
                            $q=$c->query("SELECT imie, nazwisko FROM zawodnik WHERE pozycja_id=".$_POST['pozycja']."");
                            while(($tab=$q->fetch_assoc())!=0){
                                print("<li>".$tab['imie']." ".$tab['nazwisko']."</li>");
                            }
                        }
                        $c->close();
                    ?>
                </ol>
            </section>
        </section>
        <section id="glowny">
            <h3>Liga mistrzów</h3>
        </section>
        <section id="liga">
            <?php
                $c=new mysqli('localhost','root','','egzamin');
                $q=$c->query("SELECT zespol, punkty, grupa FROM liga order by punkty desc");
                while(($tab=$q->fetch_assoc())!=0){
                    print("<section id=\"druzyna\">
                    <h2>".$tab['zespol']."</h2>
                    <h1>".$tab['punkty']."</h1>
                    <p>grupa: ".$tab['grupa']."</p>
                    </section>");
                }
                $c->close();
            ?>
        </section>
    </body>
</html>

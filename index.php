<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Login</title>
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <style>
    body { padding: 1.5em; }
    </style>
</head>
<body>
    <?php
    // Dummy Passwort, sollte aus DB kommen
    $correctPassword = "1234";
    $passwordMessage = "";
    $formMessage = "";

    /*
        Prüfen, ob Formulardaten übermittelt wurden.

        count( $_POST ) zählt die Elemente in einem Array. Ist die Anzuahl größer 0
    */
    if( count( $_POST ) > 0 ) {
        /*
            Aus $_POST wird der Wert mit dem Index "password" ausgelesen.

            Der Index ergibt sich aus dem name Attribut der gesendeten Formular-Felder.    
         */
        if ( array_key_exists( "password", $_POST ) ) {
            $password = $_POST["password"];
            
            // Pflichtfeld darf nicht leer sein
            if ( $password == "" ) {
                $passwordMessage = "Bitte füllen Sie das Passwort-Feld aus.";
            }
            // Prüfen, ob das korrekte Passwort eingegeben wurde
            elseif ( $password == $correctPassword ) {
                $formMessage = "Jipie, Passwort korrekt!";
            }
            
            else {
                $passwordMessage = "Falsches Passwort";
            }
        }
        else {
            $formMessage = "Das Formular wurde nicht korrekt abgesendet.";
        }
    }

    ?>
    <h1>Login</h1>
    <?php echo $formMessage; ?>

    <!-- Emmet: form.pure-form.pure-form-stacked -->
    <form action="" class="pure-form pure-form-stacked" method="post">
        <label for="passWord">Passwort:</label>
        <!-- Emmet: input:password -->
        <input type="password" name="password" id="passWord">
        <?php echo $passwordMessage; ?>

        <!-- Emmet: input:submit -->
        <input type="submit" class="pure-button pure-button-primary" value="Senden">
    </form>
</body>
</html>
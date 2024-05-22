
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
</head>
<body>
    <h1>Dati Braccialetto</h1>
    <table>
        <tr>
            <th>N°</th>
            <th>Anchor ID</th>
            <th>Position</th>
            <th>Heart Rate</th>
            <th>Body Temperature</th>
            <th>Blood Pressure</th>
        </tr>
        
    </table>
    <br>
     -->
    <?php

        // Connessione al database
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'iot project';

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
  
        // Verifica se la richiesta è stata inviata
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ottieni i dati dal form
        $ID_cod = $_POST['IDoperator'];
        $password = $_POST['password'];

        // Query per selezionare l'utente dal database
        $query = "SELECT * FROM user WHERE ID_cod = '$ID_cod' AND Password = '$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            // L'utente è stato trovato nel database, quindi impostiamo la sessione e reindirizziamo alla dashboard
            $_SESSION['ID_cod'] = $ID_cod;
            echo "Connessione avvenuta con successo";
            header("Location: dashboard.php");
            exit();
        } else {
            // Credenziali non valide, mostra un messaggio di errore
            $error_message = "Credenziali non valide. Si prega di riprovare.";
            echo "<p> Credenziali non valide. Si prega di riprovare. </p>";
        }
    }




    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $select = "SELECT * FROM bracelet_data";
    $result = $conn->query($select);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr><td>".$row["id"]."</td><td>".$row["anchor_id"]."</td><td>".$row["position"]."</td><td>".$row["heart_rate"]."</td><td>".$row["body_temperature"]."</td><td>".$row["blood_pressure"]."</td></tr>";
        }
    }
    // Ricezione dei dati dalla richiesta HTTP
    $data = file_get_contents('php://input');

    if(!empty($data)){
        // Pattern regex per trovare i dati numerici
        $pattern = '/(\d+(?:\.\d+)?)/';

        // Trova i corrispondenti numeri nella stringa
        preg_match_all($pattern, $data, $matches);

        // $matches[0] contiene tutti i numeri trovati
        $numericData = $matches[0];

        // Esempio di inserimento dei dati nel database
        $insert = "INSERT INTO bracelet_data (anchor_id, position, heart_rate, body_temperature, blood_pressure) VALUES ('" . $numericData[0] . "', '" . $numericData[1] . "', '" . $numericData[2] . "', '" . $numericData[3] . "', '" . $numericData[4] . "')";

        if ($conn->query($insert) === TRUE) {
            echo "<p>Dati inseriti correttamente nel database</p><br>";
        } else {
            echo "<p>Errore durante l'inserimento dei dati nel database: " . $conn->error . "</p><br>";
        }
    }else{
        echo "<p>Nessun dato ricevuto</p><br>";
    }  

    // Chiusura della connessione al database
    //$conn->close();
    ?>

    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><button>Refresh</button></a>
</body>
</html>
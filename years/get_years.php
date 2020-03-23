<?php

    include "../includes/config.php";

        $sql = "SELECT * from year";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($results);
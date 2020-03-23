<?php

        include '../includes/config.php';


            $sql = "SELECT c.id as id, ClassName,ClassNameNumeric,CreationDate,name from tblclasses c left join stream s on c.stream_id = s.stream_id";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);


        echo json_encode($results);
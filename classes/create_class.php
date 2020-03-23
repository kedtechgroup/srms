<?php

    include '../includes/config.php';


        $errors = array();      // array to hold validation errors
        $data = array();      // array to pass back data



        if (empty($_POST['classname']))
            $errors['classname'] = 'Class is required.';

        if (empty($_POST['class_name_numeric']))
        $errors['class_name_numeric'] = 'class_name_numeric is required.';

        if (empty($_POST['stream_id']))
        $errors['stream_id'] = 'stream_id is required.';

        // if there are any errors in our errors array, return a success boolean of false
        if (!empty($errors)) {

            // if there are items in our errors array, return those errors
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {

            $classname = $_POST['classname'];
            $classnamenumeric = $_POST['class_name_numeric'];
            $section = $_POST['stream_id'];

            $sql = "INSERT INTO  tblclasses(ClassName,ClassNameNumeric,stream_id) 
                        VALUES(:classname,:classnamenumeric,:section)";

            $query = $dbh->prepare($sql);

            $query->bindParam(':classname', $classname, PDO::PARAM_STR);
            $query->bindParam(':classnamenumeric', $classnamenumeric, PDO::PARAM_STR);
            $query->bindParam(':section', $section, PDO::PARAM_STR);


            $query->execute();
            // show a message of success and provide a true success variable
            $data['success'] = true;
            $data['message'] = 'Success!';
        }
            echo json_encode($data);

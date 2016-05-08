# Tomi php mysqli database abstraction layer

* Uses php's mysqli extension

        require ('config.php');
        require ('Database.php');

        $Database = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $res = $Database->query("SELECT * FROM `test` WHERE 1");

        $allRows = $Database->allRows($res);

        echo ($allRows);
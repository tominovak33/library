<?php

class Database {

    private $dbConnection;
    private $dbHost;
    private $dbUser;
    private $dbPassword;
    private $dbName;

    function __construct($dbHost, $dbUser, $dbPassword, $dbName) {
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;

        if (!$this->dbConnection) {
            $this->dbConnection = new mysqli($this->dbHost, $this->dbUser,$this->dbPassword, $this->dbName);
        } if (!$this->dbConnection) {
            trigger_error('DB ERROR connecting to database: '.mysqli_connect_error(), E_USER_ERROR);
        } if (mysqli_connect_errno()) {
            trigger_error('DB ERROR selecting database: '.mysqli_connect_error(), E_USER_ERROR);
        }
    }

    public function query($sql) {
        global $dbQueryCount;
        $dbQueryCount++;
        return $this->dbConnection->query($sql);
    }

    public function escapeString($str) {
        return mysqli_real_escape_string($this->dbConnection, $str);
    }

    public function lastAutoIncrementID() {
        return mysqli_insert_id($this->dbConnection);
    }

    public function fetchAssoc($res) {
        return mysqli_fetch_assoc($res);
    }

    public function fetchArray($res) {
        return mysqli_fetch_array($res);
    }

    public function numRows($res) {
        return mysqli_num_rows($res);
    }

    public function affectedRows() {
        return mysqli_affected_rows($this->dbConnection);
    }

    public function allRows($res) {
        $rows = [];
        while ($row = $this->fetchAssoc($res)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function tableColumnNames($tableNme) {
        $tableRows = false;
        $result = $this->query("SHOW COLUMNS FROM " . $tableNme);
        while ($row = $this->fetchAssoc($result)) {
            $tableRows[] = $row['Field']; // Add the actual field name of the column
        }
        return $tableRows;
    }

    public function listTables() {
        $tables = false;
        $result = $this->query("SHOW TABLES");
        while ($row = $this->fetchAssoc($result)) {
            foreach ($row as $table_name) {
                $tables[] = $table_name;
            }
        }
        return $tables;
    }
}
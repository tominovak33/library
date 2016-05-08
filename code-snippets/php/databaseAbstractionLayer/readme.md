# Tomi php mysqli database abstraction layer

## Description

A extremely basic and lightweight sql database abstraction layer for php.

## Notice

This was created with the purpose of using it for quick testing and prototyping, NOT for production use.

Due to the lack of good error handling and very basic functionality, I would not recommend using this for production applications.

## Requirements

  * php version:
      * Tested on 5.6
      * (Probably) works on 5.2 - 5.6
  * php mysqli extension

## Example use

      <?php

      require ('config.php');
      require ('Database.php');

      $Database = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      $res = $Database->query("SELECT * FROM `test` WHERE 1");

      $allRows = $Database->allRows($res);

      echo ($allRows);

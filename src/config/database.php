<?php

class Connect extends PDO {
    const HOST = "sql104.infinityfree.com";
    const DB = "if0_36657082_bloodshare";
    const USER = "if0_36657082";
    const PSW = "y6dcF1Ipz7M";

    public function __construct() {
        try {
            parent::__construct(
                "mysql:host=" . self::HOST . ";dbname=" . self::DB . ";charset=utf8",
                self::USER,
                self::PSW,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo $e->getMessage() . " " . $e->getFile() . " " . $e->getLine();
        }
    }
}

?>

<?php

namespace NuWorks\FeatureTestPrimer;

use Exception;
use PDO;

/**
 * Description of MySQLDatabaseReader
 *
 * @author ervinne
 */
class MySQLDatabaseReader implements DatabaseReader
{

    /** @var PDO */
    private $pdo;

    public function setPDO($pdoInstance)
    {
        $this->pdo = $pdoInstance;
    }

    public function getDatabaseTables($databaseName)
    {
        $tableNames = $this->getDatabaseTableNames($databaseName);

        echo PHP_EOL;
        echo json_encode($tableNames);
        echo PHP_EOL;
    }

    private function getDatabaseTableNames($databaseName)
    {
        $sqlString = "SELECT TABLE_NAME AS 'table' 
                        FROM INFORMATION_SCHEMA.TABLES 
                        WHERE TABLE_SCHEMA = :database_name;";

        $stmt = $this->pdo->prepare($sqlString);
        $stmt->execute(['database_name' => $databaseName]);

        $tableNames = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

        return $tableNames;
    }

    private function validatePDOInstance()
    {
        if (!$this->pdo) {
            throw new Exception("A PDO instance must be injected before use.");
        }
    }

}

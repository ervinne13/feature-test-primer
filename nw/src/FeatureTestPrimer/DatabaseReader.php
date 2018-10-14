<?php

namespace NuWorks\FeatureTestPrimer;

/**
 * Description of TableReader
 *
 * @author ervinne
 */
interface DatabaseReader
{
    function setPDO($pdoInstance);

    function getDatabaseTables($databaseName);
}

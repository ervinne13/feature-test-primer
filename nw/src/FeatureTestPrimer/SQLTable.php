<?php

namespace NuWorks\FeatureTestPrimer;

/**
 * Description of SQLTable
 *
 * @author ervinne
 */
class SQLTable
{

    private $name;
    private $columns;

    /**
     * 
     * @param string
     */
    public function __construct($name = null, $columns = [])
    {
        $this->name = $name;
        $this->columns = $columns;
    }

    /** @return string */
    public function getName()
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName($name)
    {
        $this->name = $name;
    }

    /** @return array     */
    public function getColumns()
    {
        return $this->columns;
    }

    /** @param array $columns */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /** @param string $column */
    public function addColumn($column)
    {
        $this->columns[] = $column;
    }

}

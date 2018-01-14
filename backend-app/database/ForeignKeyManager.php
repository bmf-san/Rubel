<?php
namespace Database;

use Illuminate\Database\DatabaseManager;

class ForeignKeyManager
{
    /**
     * DatabaseManager
     *
     * @var $dbManager
     */
    protected $dbManager;

    /**
     * ForeignKeyManager __constructor
     *
     * @param DatabaseManager $dbManager
     */
    public function __construct(DatabaseManager $dbManager)
    {
        $this->dbManager = $dbManager;
    }

    /**
     * Set foreign key check off
     *
     * @return void
     */
    public function setFKCheckOff(): void
    {
        switch ($this->dbManager->getDriverName()) {
            case 'mysql':
                $this->dbManager->statement('SET FOREIGN_KEY_CHECKS=0');
                break;
            case 'sqlite':
                $this->dbManager->statement('PRAGMA foreign_keys = OFF');
                break;
        }
    }

    /**
     * Set foreign key check on
     *
     * @return void
     */
    public function setFKCheckOn(): void
    {
        switch ($this->dbManager->getDriverName()) {
            case 'mysql':
                $this->dbManager->statement('SET FOREIGN_KEY_CHECKS=1');
                break;
            case 'sqlite':
                $this->dbManager->statement('PRAGMA foreign_keys = ON');
                break;
        }
    }
}

<?php
namespace Database;

use Illuminate\Database\DatabaseManager;

class ForeignKeyManager
{
    /**
     * DatabaseManager
     *
     * @var $db
     */
    protected $db;

    /**
     * ForeignKeyManager __constructor
     *
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * Set foreign key check off
     *
     * @return void
     */
    public function setFKCheckOff()
    {
        switch ($this->db->getDriverName()) {
            case 'mysql':
                $this->db->statement('SET FOREIGN_KEY_CHECKS=0');
                break;
            case 'sqlite':
                $this->db->statement('PRAGMA foreign_keys = OFF');
                break;
        }
    }

    /**
     * Set foreign key check on
     *
     * @return void
     */
    public function setFKCheckOn()
    {
        switch ($this->db->getDriverName()) {
            case 'mysql':
                $this->db->statement('SET FOREIGN_KEY_CHECKS=1');
                break;
            case 'sqlite':
                $this->db->statement('PRAGMA foreign_keys = ON');
                break;
        }
    }
}

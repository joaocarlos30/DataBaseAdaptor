<?php

/**
 * Class para ligação a uma Base de Dados 
 * PDO - PHP
 * 
 * @author João Carlos 
 */

 class DataBase {

    const CONNECT_TIMEOUT = 5; // in seconds

    /**
     * variavel caminho BD
     * 
     * @var string 
     */
    private $dsn;

    /**
     * Username BD
     * 
     * @var string
     */
    private $username;

    /**
     * password BD
     * 
     * @var string 
     */
    private $password;

    /**
     * Ligação BD
     * 
     * @var object 
     */
    private $connection;

    /**
     * Undocumented variable
     *
     * @var array
     */
    private $pdoOptions;

    /**
     * Undocumented function
     *
     * @param string $dsn Host da ligação 
     * @param string $username User da BD
     * @param string $password Pass da BD
     * 
     * @return void
     */
    public function __construct($dsn, $username, $password) {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;

        $this->pdoOptions = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_TIMEOUT => PDO::CONNECT_TIMEOUT
        ];

        $this->makeConnection();
    }

    /**
     * Criar ligação
     *
     * @return object
     */
    protected function makeConnection() {
        $this->connection = new PDO($this->dsn, $this->username, $this->password, $this->pdoOptions);

        return $this->connection;
    }

    /**
     * Verifica ligação a BD
     *
     * @return boolean
     */
    public function isConnected() {
        return (boolean) $this->connection;
    }
}

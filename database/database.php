<?php
class Database
{
    private $link;

    public function __construct()
    {
        $this->connect();
    }

     private function connect()
    {
        $config = require_once 'config.php';
        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'].';charset='.$config['charset'];
        $this->link = new PDO($dsn, $config['username'], $config['password']);
        return $this;
    }

    public function execute($sql)
    {
        $sth = $this->link->prepare($sql);
        return $sth->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if($result === false) {
            return [];
        }
        else {
            return $result;
        }
    }
}


$db = new Database();
#$res = $db->execute("select * from `client`");


foreach($db->query("select * from `client`") as $value)
{
    echo $value['client_id']. ' ';
    echo $value['client_name']. ' ';
    echo $value['client_phone']. ' ';
    echo $value['client_mail']. ' ';
    echo $value['client_password']. ' ';
    echo $value['client_registration_date']. '<br>';
}
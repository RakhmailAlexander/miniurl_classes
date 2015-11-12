<?php
class DbQueries extends PDO
{
    public $userUrl;
    public $url;
    public $toTime;
    public function select()
    {
        $querySelect = "SELECT url FROM url_table WHERE user_url = :urlKey";
        $result = $this->prepare($querySelect);
        $result->execute(array(':urlKey' => $this->userUrl));
        $result = $result->fetch(PDO::FETCH_ASSOC);
        return ($result);
    }
    public function insert()
    {
        $queryInsert = "INSERT INTO url_table(url, user_url, expiry_date) VALUES(:url, :userUrl, :time)";
        $result = $this->prepare($queryInsert);
        $result->execute(array(':url' => $this->url, ':userUrl' => $this->userUrl, ':time' => $this->toTime));
    }
}
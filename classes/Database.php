<?php

class Database
{
    private $host = '****';
    private $user = '****';
    private $pass = '****';
    private $base = '****';
    public $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->base);
        if (!$this->mysqli) {
            exit ('Нет подключения к базе!');
        }
        $this->mysqli->query('SET NAMES utf8');
    }


    public function saveURL(URL $url)
    {
        $sql = "INSERT INTO  urls ( url, short_url ) VALUES ('$url->url', '$url->short_url')";
        $result = mysqli_query($this->mysqli, $sql);
        if (!$result)
            throw new Exception('Ошибка базы данных!');
        return true;

    }

    public function getByURl($url)
    {

        $sql = "SELECT * from urls WHERE url = '$url'";
        $result = mysqli_query($this->mysqli, $sql);
        return $result;
    }
    public function addClick($short_url)
    {
        $sqlSelect = "SELECT * from urls WHERE short_url = '$short_url'";
        $result = mysqli_query($this->mysqli, $sqlSelect);
        if (!$result)
            throw new Exception('Ошибка базы данных!');
        $url = $result->fetch_assoc();
        $sqlUpdate = "UPDATE urls SET clicks = ".($url['clicks']+1)." WHERE id = ".$url['id'];
        $result = mysqli_query($this->mysqli, $sqlUpdate);
        if (!$result)
            throw new Exception('Ошибка базы данных!');
        return $url['url'];

    }


}
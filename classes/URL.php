<?php


class URL
{
    public $url;
    public $short_url;
    public $shotrsite = 'http://ua-media/';


    public function __construct($url)
    {
        $this->url = $url;
        $this->short_url = $this->shotrsite . $this->createURL();

    }

    private function createURL()
    {
        $symbols = array('a','b','c','d','e','f', 'g','h','i','j','k','l', 'm','n','o','p','r','s', 't','u','v','w','x','y', 'z',
            'A','B','C','D','E', 'G','H','I','J','K','L', 'M','N','O','P','R','S', 'T','U','V','W','X','Y', 'Z','F');
        $url = "";
        for($i = 0; $i < 9; $i++)
        {
            $url .= $symbols[rand(0, count($symbols) - 1)];
        }
        return $url;
    }


}
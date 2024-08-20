<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'blog_db');

class Database
{
    public $host = HOST;
    public $user = USER;
    public $password = PASSWORD;
    public $database = DATABASE;

    public $link;
    public $error;

    public function __construct()
    {
        $this->db_connect();
    }

    // connecting to the database
    public function db_connect()
    {
        $this->link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if(!$this->link)
        {
            $this->error = "Database conntection failed";
            return false;
        }
    }


    // Insert to the database
    public function insert($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);
        if($result)
        {
            return $result;
        }else {
            return false;
        }
    }


        /**
         * Get the data from database
         * @param $query
         */
    public function select($query)
    {
        $result = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);
        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }else {
            return false;
        }
    }

        /**
         *  update a row from database
         * @param $query
         */
        public function update($query)
        {
            $result = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);
            if($result)
            {
                return $result;
            }else {
                return false;
            }
        }


        /**
         *  Delete from database
         * @param $query
         */
        public function delete($query)
        {
            $result = mysqli_query($this->link, $query) or die($this->link->error.__LINE__);
            if($result)
            {
                return $result;
            }else {
                return false;
            }
        }
    
}

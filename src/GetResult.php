<?php
class GetResult extends DbQueries
{
    public function msg()
    {
        $select = $this->select();
        if (!$select) {
            if (substr($this->url, 0, 7) != 'http://' && substr($this->url, 0, 8) != 'https://') {
                $this->url = 'http://' . $this->url;
            }
            $insert = $this->insert();
            echo 'your full link <a href="' .$this->url. '">' . $this->url . '</a>,<br>
                your mini link <a href="http://' . $_SERVER['SERVER_NAME'] . '/' . $this->userUrl . '">
                ' . $_SERVER['SERVER_NAME'] . '/' . $this->userUrl . '</a>';
        } else {
            echo 'Such link is already exists. Please try again';
        }
        unset($this->url);
    }
    public function redir()
    {
        $select = $this->select();
        if (!$select) {
            header("Refresh: 5; URL=http://{$_SERVER['SERVER_NAME']}");
            echo 'This link does not exists. You will be redirect on start page in 5 seconds.';
            exit;
        } else {
            return $select['url'];
        }
    }
}

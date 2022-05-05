<?php

class Mail
{
    private $emailuser;

    public function getidmail()
    {
        return $this->idmail;
    }

    public function getemailuser()
    {
        return $this->emailuser;
    }
    public function setemailuser($emailuser)
    {
        $this->emailuser = $emailuser;
    }

    public function __construct($emailuser)
    {
        $this->emailuser = $emailuser;
    }
}

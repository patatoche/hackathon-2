<?php

namespace Hackathon\LevelD;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        $methods = array('md5', 'crc32', 'base64_encode', 'sha1');

        $this->origin = "Not found :'(";

        foreach ($methods as $method) {

            $pwd = 'aaaa';
            while ($pwd < 'zzzz') {
                if ($method($pwd) === $this->hash) {
                    $this->origin = $pwd;
                    break;
                }
                $pwd++;
            }
        }

        return $this->origin;
    }

}

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
        $this->origin = "Not found :'(";

        for ($chr1 = 'a'; $chr1 <= 'z'; $chr1++) {
            for ($chr2 = 'a'; $chr2 <= 'z'; $chr2++) {
                for ($chr3 = 'a'; $chr3 <= 'z'; $chr3++) {
                    for ($chr4 = 'a'; $chr4 <= 'z'; $chr4++) {
                        $pwd = $chr1.$chr2.$chr3.$chr4;

                        if (call_user_func('md5', $pwd) === $this->hash) {

                            $this->origin = $pwd;

                            break(4);
                        }
                    }
                }
            }
        }

        return $this->origin;
    }
}

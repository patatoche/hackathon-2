<?php

namespace Hackathon\LevelB;

/**
 * Class Difference
 * En réalité, il suffit d'implémenter un algorythme bien spécifique.
 * http://jeux-et-mathematiques.davalan.org/lang/algo/lev/index.html
 * https://openclassrooms.com/forum/sujet/distance-de-levenshtein-79426.
 */
class Difference
{
    private $a;     // Chaine A
    private $b;     // Chaine A
    public $cost;   // Coût de changement

    /**
     * @param $a    // Chaine A
     * @param $b    // Chaine B
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->cost = $this->whatIsTheCostPlease($a, $b);
    }

    /**
     * @param $this->a
     * @param $this->b
     *
     * @return mixed
     */
    public function whatIsTheCostPlease()
    {
        $n = strlen($this->a);
        $m = strlen($this->b);

        for ($i = -1; $i < $n; $i++) {
            $matrix[$i] = [];
            $matrix[$i][-1] = $i + 1;
        }
        for ($j = -1; $j < $m; $j++) {
            $matrix[-1][$j] = $j + 1;
        }
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $cout = $this->a[$i] == $this->b[$j] ? 0 : 1;
                $matrix[$i][$j] = min(1 + $matrix[$i][$j - 1], 1 + $matrix[$i - 1][$j], $cout + $matrix[$i - 1][$j - 1]);
            }
        }

        return $matrix[$n - 1][$m - 1];
    }

}

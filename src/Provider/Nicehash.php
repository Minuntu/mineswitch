<?php
namespace Minuntu\MineSwitch\Provider {

    use Minuntu\MineSwitch\ProviderInterface;

    class Nicehash implements ProviderInterface
    {
        static $mapping = [
           "scrypt" =>  [0, 3333],
           "sha256" =>  [1, 3334],
           "scryptnf" =>  [2, 3335],
           "x11" =>  [3, 3336],
           "x13" =>  [4, 3337],
           "keccak" =>  [5, 3338],
           "x15" =>  [6, 3339],
           "nist5" =>  [7, 3340],
           "neoscrypt" =>  [8, 3341],
           "lyra2re" =>  [9, 3342],
           "whirlpoolx" =>  [10, 3343],
           "qubit" =>  [11, 3344],
           "quark" =>  [12, 3345],
           "axiom" =>  [13, 3346],
           "lyra2rev2" =>  [14, 3347],
           "scryptjanenf16" =>  [15, 3348],
           "blake256r8" =>  [16, 3349],
           "blake256r14" =>  [17, 3350],
           "blake256r8vnl" =>  [18, 3351],
           "hodl" =>  [19, 3352],
           "daggerhashimoto" =>  [20, 3353],
           "decred" =>  [21, 3354],
           "cryptonight" =>  [22, 3355],
           "lbry" =>  [23, 3356],
           "equihash" =>  [24, 3357, 330],
           "pascal"=>  [25, 3358],
           "x11gost" =>  [26, 3359],
           "sia" =>  [27, 3360],
           "blake2s" =>  [28, 3361],
           "skunk" =>  [29, 3362],
        ];

        static $nicehashData;

        private $location;

        public function __construct($location, $username, $password)
        {
            if(is_null(self::$nicehashData)) {
                $json = file_get_contents(
                    "https://www.nicehash.com/api?method=simplemultialgo.info"
                );
                if ($json === false) {
                    throw new \Exception('Nicehash parsing error');
                }
                self::$nicehashData  = json_decode($json, true);
            }
            $this->location = $location;
            $this->username = $username;
            $this->password = $password;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function getProfitability($algo, $hashrate) 
        {
            $nhAlgo = self::$nicehashData['result']['simplemultialgo'][
                array_search(
                    $algo, array_column(
                        self::$nicehashData['result']['simplemultialgo'], 'name'
                    )
                )
            ];
            return $nhAlgo['paying'] * $hashrate;
        }

        public function getStratum($algo)
        {
            return "stratum+tcp://".$algo.".".
                $this->location.".nicehash.com:".
                self::$mapping[$algo][1];
        }
    }
}
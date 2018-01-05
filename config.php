<?php
/**
 * Example config file
 */
$nicehash = new \Minuntu\MineSwitch\Provider\Nicehash();
return [
    new \Minuntu\MineSwitch\MiningConfig(["equihash" => 600], $nicehash),
    new \Minuntu\MineSwitch\MiningConfig(["cryptonight" => 900], $nicehash),
    new \Minuntu\MineSwitch\MiningConfig(["lyra2rev2" => 46*1000*1000], $nicehash),
    new \Minuntu\MineSwitch\MiningConfig(["daggerhashimoto" => 40*1000*1000 ], $nicehash),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 39*1000*1000 ,"sia" => 782*1000*1000],
        $nicehash
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 39*1000*1000 ,"decred" => 454*1000*1000],
        $nicehash
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 39*1000*1000 ,"lbry" => 41*1000*1000],
        $nicehash
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 39*1000*1000 ,"pascal" => 528*1000*1000],
        $nicehash
    ),
];
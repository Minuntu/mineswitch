<?php
$nicehash = new \Minuntu\MineSwitch\Provider\Nicehash("eu","3FxDYFMeFVxo3TzKDvvWUmuLy6fAAp8ZJ6.nas01", "x");
$claymore = new \Minuntu\MineSwitch\Miner\Amd\ClaymoreDual();
return [
    new \Minuntu\MineSwitch\MiningConfig(["equihash" => 330], $nicehash, $claymore),
    new \Minuntu\MineSwitch\MiningConfig(["cryptonight" => 770], $nicehash, $claymore),
    new \Minuntu\MineSwitch\MiningConfig(["daggerhashimoto" => 29*1000*1000 ], $nicehash, $claymore),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 29*1000*1000 ,"sia" => 707*1000*1000],
        $nicehash, $claymore
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 29*1000*1000 ,"decred" => 1000*1000*1000],
        $nicehash, $claymore
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 29*1000*1000 ,"lbry" => 100*1000*1000],
        $nicehash, $claymore
    ),
    new \Minuntu\MineSwitch\MiningConfig(
        ["daggerhashimoto" => 29*1000*1000 ,"pascal" => 415*1000*1000],
        $nicehash, $claymore
    ),
];
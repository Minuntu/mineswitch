<?php
namespace Minuntu\MineSwitch\Miner\Amd {

    use Minuntu\MineSwitch\MinerInterface;
    use Minuntu\MineSwitch\MiningConfig;
    use Minuntu\MineSwitch\Provider\Nicehash;
    use Minuntu\MineSwitch\ProviderInterface;

    class ClaymoreDual implements MinerInterface
    {
        public function getCommandLine(MiningConfig $config, ProviderInterface $provider)
        {
            $cmdline = "ethdcrminer64 -platform 1 -mport 3334";
            if($provider instanceof Nicehash ) {
                $cmdline .= " -esm 3 -allpools 1 -estale 0";
            }
            $cmdline .= " -epool ".$provider->getStratum($config->getAlgo(0));
            $cmdline .= " -ewall ".$provider->getUsername();
            if($config->isMulti()) {
                $cmdline .= " -dpool ".$provider->getStratum($config->getAlgo(1));
                $cmdline .= " -dwall ".$provider->getUsername();
            }
            $cmdline .= " -dpsw ".$provider->getPassword()." -epsw ".$provider->getPassword();
            $cmdline .= " -dcoin ".$config->getAlgo(1);
            return $cmdline;
        }
    }
}
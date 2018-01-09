<?php
namespace Minuntu\MineSwitch {
    interface MinerInterface
    {
        public function getCommandLine(MiningConfig $config, ProviderInterface $provider);
    }
}
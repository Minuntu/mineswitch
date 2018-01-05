<?php
namespace Minuntu\MineSwitch {
    interface ProviderInterface
    {
        public function getProfitability($algo, $hashrate);
    }
}
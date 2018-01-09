<?php
namespace Minuntu\MineSwitch {
    class MiningConfig
    {

        private $hashratesArray;
        private $providerController;
        private $miner;

        public function __construct($hashrates, ProviderInterface $controller, MinerInterface $miner)
        {
            $this->hashratesArray = $hashrates;
            $this->providerController = $controller;
            $this->miner = $miner;
        }

        public function getProfitability() 
        {
            $profitability = 0;
            foreach ($this->hashratesArray as $algo => $hashrate) {
                $profitability += $this->providerController->getProfitability(
                    $algo,
                    $hashrate
                );
            }
            return round($profitability/1000/1000/1000, 8);
        }

        public function getName() 
        {
            return implode("+", array_keys($this->hashratesArray));
        }

        public function getAlgo($key) {
            $algos = array_keys($this->getAlgos());
            if(empty($algos[$key]))
                return false;
            return $algos[$key];
        }

        public function getAlgos() {
            return $this->hashratesArray;
        }

        public function isMulti() {
            return count($this->hashratesArray) > 1;
        }

        public function getCommandLine() {
            return $this->miner->getCommandLine($this, $this->providerController);
        }
    }
}
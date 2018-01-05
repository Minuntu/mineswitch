<?php
namespace Minuntu\MineSwitch {
    class MiningConfig
    {

        private $hashratesArray;
        private $profitabilityController;

        public function __construct($hashrates, ProviderInterface $controller)
        {
            $this->hashratesArray = $hashrates;
            $this->profitabilityController = $controller;
        }

        public function getProfitability() {
            $profitability = 0;
            foreach ($this->hashratesArray as $algo => $hashrate) {
                $profitability += $this->profitabilityController->getProfitability(
                  $algo,
                  $hashrate
                );
            }
            return round($profitability/1000/1000/1000,8);
        }

        public function getName() {
            return implode("+",array_keys($this->hashratesArray));
        }
    }
}
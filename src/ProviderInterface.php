<?php
namespace Minuntu\MineSwitch {
    interface ProviderInterface
    {
        public function __construct($location, $username, $password);
        public function getProfitability($algo, $hashrate);
        public function getStratum($algo);
        public function getUsername();
        public function getPassword();

    }
}
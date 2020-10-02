<?php

namespace App\Command;

use App\Converter\JsonConverter;
use App\Hook\RealEstateHook;
use App\Validator\Api;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RealEstateExecutor extends Command
{
    public $formatter;

    protected function configure()
    {
        $this->setName('real-estate-executor');
        $this->formatter = new RealEstateHook();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $formatted_ads = [];

        $ads = JsonConverter::jsonToArray('data/real_estate.json');

        foreach ($ads as $ad) {
            //var_dump($ad); die();

            $formatted_ad = $this->formatter->formatAd($ad);
            $formatted_ads [] = $formatted_ad;
            Api::send($formatted_ad, 'real_estate');
        }

        print_r($formatted_ads);

        return 0;
    }
}

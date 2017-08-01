<?php

namespace Migration;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Hello extends Command {

    protected function execute(InputInterface $input, OutputInterface $output)/* arguments type hinting for limititing or validating  arguments */ {
        //
        //echo "Hey Shachi";
        $filename=__DIR__.'/../catalog_product.csv';
        echo $filename;
        if (file_exists($filename)) {
            echo "inside";
            $csv = \League\Csv\Reader::createFromPath($filename);

//get the first row, usually the CSV header
            $headers = $csv->fetchAssoc();

//get 25 rows starting from the 11th row
            $res = $csv->setOffset(0)->setLimit(25)->fetchAssoc();
            foreach ($res as $row) {
                print_r($row);
            }
            
        }
    }

    protected function executeMe(InputInterface $input, OutputInterface $output) {
        
    }

    protected function configure() {
        $this
                // the name of the command (the part after "bin/console")
                ->setName('app:create-user')

                // the short description shown while running "php bin/console list"
                ->setDescription('Creates a new user.')

                // the full command description shown when running the command with
                // the "--help" option
                ->setHelp('This command allows you to create a user...')
        ;
    }

}


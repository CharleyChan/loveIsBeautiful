<?php
/**
 * Created by PhpStorm.
 * User: charley
 * Date: 16/6/16
 * Time: 下午1:24
 */
namespace Acme\DemoBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends ContainerAwareCommand
{
    protected function configure()
{
    $this
        ->setName('demo:greet')
        ->setDescription('Greet someone')
        ->addArgument(
            'name',
            InputArgument::OPTIONAL,
            'Who do you want to greet?'
        )
        ->addOption(
            'yell',
            null,
            InputOption::VALUE_REQUIRED,
            'If set, the task will yell in uppercase letters'
        )
    ;
}

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        if ($name) {
            $text = 'Hello '.$name;
        } else {
            $text = 'Hello';
        }

        if ($input->getOption('yell')) {
            $text = strtoupper($text);
            for($i=0; $i<$input->getOption('yell'); $i++){
                $output->writeln($text);
            }

        }else{
            $output->writeln($text);
        }

    }
}
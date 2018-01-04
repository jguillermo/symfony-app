<?php

namespace Misa\Users\Infrastructure\Ui\UsersBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use XMLWriter;

/**
 * ExportUserCommand Class
 *
 * @package Misa\Users\Infrastructure\Ui\UsersBundle\Command
 * @author Jose Guillermo <jguillermo@outlook.com>
 * @copyright (c) 2017, Orbis
 */
class ExportUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('app:user:export')
            ->setDescription('Exporta todos los usuarios')
            ->setHelp('exporta los usuarios en un archivo users.xml');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Export',
            '============',
            '',
        ]);

        $userList = $this->getContainer()->get('users.users.rep');
        $users = $userList->listAll([]);
        $this->toXml($users);

        $output->writeln([
            'success',
        ]);

    }

    private function toXml($users)
    {
        $x=new XMLWriter();
        $x->openMemory();
        $x->startDocument('1.0','UTF-8');

        $x->startElement('add');
        foreach ($users as $user) {
            $x->startElement('doc');
            foreach ($user as $key=>$value){
                $x->startElement('field');
                $x->writeAttribute('name',$key);
                $x->text($value);
                $x->endElement();
            }
            $x->endElement();
        }
        $x->endElement();
        $x->endDocument();
        $xml = $x->outputMemory();
        file_put_contents("./export/users.xml", $xml);
    }
}
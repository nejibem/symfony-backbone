<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150106074540 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'ALTER TABLE `blurb` ADD CONSTRAINT `blurb_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `my_user` (`id`)';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'ALTER TABLE `blurb` DROP FOREIGN KEY `blurb_ibfk_2`';

        $this->addSql($sql);
    }
}

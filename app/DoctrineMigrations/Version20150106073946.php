<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150106073946 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'ALTER TABLE `blurb` ADD `user_id` int(11) DEFAULT NULL';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'ALTER TABLE `blurb` DROP `user_id`';

        $this->addSql($sql);
    }
}

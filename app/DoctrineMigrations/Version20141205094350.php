<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141205094350 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE `user_group` (
                  `user_id` int(11) NOT NULL,
                  `group_id` int(11) NOT NULL,
                  PRIMARY KEY (`user_id`,`group_id`),
                  KEY `IDX_8F02BF9DA76ED395` (`user_id`),
                  KEY `IDX_8F02BF9DFE54D947` (`group_id`),
                  CONSTRAINT `FK_8F02BF9DFE54D947` FOREIGN KEY (`group_id`) REFERENCES `my_group` (`id`) ON DELETE CASCADE,
                  CONSTRAINT `FK_8F02BF9DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `my_user` (`id`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `user_group`';

        $this->addSql($sql);
    }
}

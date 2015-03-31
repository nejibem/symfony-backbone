<?php

namespace ApiBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141204134158 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE `blurb` (
                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
                  `parent_id` bigint(20) DEFAULT NULL,
                  `text` text COLLATE utf8_unicode_ci NOT NULL,
                  `created_date` datetime NOT NULL,
                  PRIMARY KEY (`id`),
                  FOREIGN KEY (`parent_id`) REFERENCES `blurb` (`id`)
                ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `blurb`';

        $this->addSql($sql);
    }
}

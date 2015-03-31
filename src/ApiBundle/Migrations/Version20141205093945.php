<?php

namespace ApiBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141205093945 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE `my_group` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
                  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `UNIQ_106F60157698A6A` (`role`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `my_group`';

        $this->addSql($sql);
    }
}

<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141205093405 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE `my_user` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
                  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
                  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
                  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
                  `is_active` tinyint(1) NOT NULL,
                  `password_reset_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
                  `created_date` datetime DEFAULT NULL,
                  `updated_date` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  UNIQUE KEY `UNIQ_4DB4FF1DF85E0677` (`username`),
                  UNIQUE KEY `UNIQ_4DB4FF1DE7927C74` (`email`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `my_user`';

        $this->addSql($sql);
    }
}

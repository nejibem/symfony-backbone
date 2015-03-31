<?php

namespace ApiBundle\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20141205094528 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = 'CREATE TABLE `my_user_login` (
                  `id` int(11) NOT NULL AUTO_INCREMENT,
                  `user_id` int(11) DEFAULT NULL,
                  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
                  `created_date` datetime DEFAULT NULL,
                  PRIMARY KEY (`id`),
                  KEY `IDX_BF4E361BA76ED395` (`user_id`),
                  CONSTRAINT `FK_BF4E361BA76ED395` FOREIGN KEY (`user_id`) REFERENCES `my_user` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci';

        $this->addSql($sql);
    }

    public function down(Schema $schema)
    {
        $sql = 'DROP TABLE `user_group`';

        $this->addSql($sql);
    }
}

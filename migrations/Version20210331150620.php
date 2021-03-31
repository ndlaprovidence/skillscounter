<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331150620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_noteSimulation (id INT AUTO_INCREMENT NOT NULL, a1_t1 DOUBLE PRECISION DEFAULT NULL, a1_t2 DOUBLE PRECISION DEFAULT NULL, a1_t3 DOUBLE PRECISION DEFAULT NULL, a2_t1 DOUBLE PRECISION DEFAULT NULL, a2_t2 DOUBLE PRECISION DEFAULT NULL, a2_t3 DOUBLE PRECISION DEFAULT NULL, scien_ep1 DOUBLE PRECISION DEFAULT NULL, scien_ep2 DOUBLE PRECISION DEFAULT NULL, scien_ep3 DOUBLE PRECISION DEFAULT NULL, hist_ep1 DOUBLE PRECISION DEFAULT NULL, hist_ep2 DOUBLE PRECISION DEFAULT NULL, hist_ep3 DOUBLE PRECISION DEFAULT NULL, lvaep1 DOUBLE PRECISION DEFAULT NULL, lvaep2 DOUBLE PRECISION DEFAULT NULL, lvaep3 DOUBLE PRECISION DEFAULT NULL, lvbep1 DOUBLE PRECISION DEFAULT NULL, lvbep2 DOUBLE PRECISION DEFAULT NULL, lvbep3 DOUBLE PRECISION DEFAULT NULL, epsep1 DOUBLE PRECISION DEFAULT NULL, epsep2 DOUBLE PRECISION DEFAULT NULL, epsep3 DOUBLE PRECISION DEFAULT NULL, speep1 DOUBLE PRECISION DEFAULT NULL, speep2 DOUBLE PRECISION DEFAULT NULL, speep3 DOUBLE PRECISION DEFAULT NULL, fran_e DOUBLE PRECISION DEFAULT NULL, fran_o DOUBLE PRECISION DEFAULT NULL, philo DOUBLE PRECISION DEFAULT NULL, grand_oral DOUBLE PRECISION DEFAULT NULL, spe1 DOUBLE PRECISION DEFAULT NULL, spe2 DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tbl_noteSimulation');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210406131058 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE note_simulation (id INT AUTO_INCREMENT NOT NULL, a1_t1 DOUBLE PRECISION DEFAULT NULL, a1_t2 DOUBLE PRECISION DEFAULT NULL, a1_t3 DOUBLE PRECISION DEFAULT NULL, a2_t1 DOUBLE PRECISION DEFAULT NULL, a2_t2 DOUBLE PRECISION DEFAULT NULL, a2_t3 DOUBLE PRECISION DEFAULT NULL, scien_ep1 DOUBLE PRECISION DEFAULT NULL, scien_ep2 DOUBLE PRECISION DEFAULT NULL, scien_ep3 DOUBLE PRECISION DEFAULT NULL, hist_ep1 DOUBLE PRECISION DEFAULT NULL, hist_ep2 DOUBLE PRECISION DEFAULT NULL, hist_ep3 DOUBLE PRECISION DEFAULT NULL, lvaep1 DOUBLE PRECISION DEFAULT NULL, lvaep2 DOUBLE PRECISION DEFAULT NULL, lvaep3 DOUBLE PRECISION DEFAULT NULL, lvbep1 DOUBLE PRECISION DEFAULT NULL, lvbep2 DOUBLE PRECISION DEFAULT NULL, lvbep3 DOUBLE PRECISION DEFAULT NULL, epsep1 DOUBLE PRECISION DEFAULT NULL, epsep2 DOUBLE PRECISION DEFAULT NULL, epsep3 DOUBLE PRECISION DEFAULT NULL, speep1 DOUBLE PRECISION DEFAULT NULL, speep2 DOUBLE PRECISION DEFAULT NULL, speep3 DOUBLE PRECISION DEFAULT NULL, fran_e DOUBLE PRECISION DEFAULT NULL, fran_o DOUBLE PRECISION DEFAULT NULL, philo DOUBLE PRECISION DEFAULT NULL, grand_oral DOUBLE PRECISION DEFAULT NULL, spe1 DOUBLE PRECISION DEFAULT NULL, spe2 DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_student (id INT NOT NULL, student_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_teacher (id INT NOT NULL, main_domain VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_38B383A1F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_student ADD CONSTRAINT FK_EC70A747BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_teacher ADD CONSTRAINT FK_EBA5AEA1BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_student DROP FOREIGN KEY FK_EC70A747BF396750');
        $this->addSql('ALTER TABLE tbl_teacher DROP FOREIGN KEY FK_EBA5AEA1BF396750');
        $this->addSql('DROP TABLE note_simulation');
        $this->addSql('DROP TABLE tbl_student');
        $this->addSql('DROP TABLE tbl_teacher');
        $this->addSql('DROP TABLE tbl_user');
    }
}

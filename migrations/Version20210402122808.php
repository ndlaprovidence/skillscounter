<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402122808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scorecard_counter DROP FOREIGN KEY FK_DCE1D85FCEEF2E3');
        $this->addSql('ALTER TABLE scorecard_counter DROP FOREIGN KEY FK_DCE1D8550253A7D');
        $this->addSql('DROP TABLE scorecard_counter');
        $this->addSql('DROP TABLE tbl_counter');
        $this->addSql('DROP TABLE tbl_scorecard');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE scorecard_counter (scorecard_id INT NOT NULL, counter_id INT NOT NULL, INDEX IDX_DCE1D8550253A7D (scorecard_id), INDEX IDX_DCE1D85FCEEF2E3 (counter_id), PRIMARY KEY(scorecard_id, counter_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_counter (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, coefficient DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE tbl_scorecard (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE scorecard_counter ADD CONSTRAINT FK_DCE1D8550253A7D FOREIGN KEY (scorecard_id) REFERENCES tbl_scorecard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scorecard_counter ADD CONSTRAINT FK_DCE1D85FCEEF2E3 FOREIGN KEY (counter_id) REFERENCES tbl_counter (id) ON DELETE CASCADE');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210405182127 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_counter (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, coefficient DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_evaluation (id INT AUTO_INCREMENT NOT NULL, scorecard_id INT NOT NULL, student_id INT NOT NULL, label VARCHAR(255) NOT NULL, date_evaluation DATE NOT NULL, value_note1 DOUBLE PRECISION DEFAULT NULL, value_note2 DOUBLE PRECISION DEFAULT NULL, value_note3 DOUBLE PRECISION DEFAULT NULL, value_note4 DOUBLE PRECISION DEFAULT NULL, INDEX IDX_7A60EFE450253A7D (scorecard_id), INDEX IDX_7A60EFE4CB944F1A (student_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_scorecard (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scorecard_counter (scorecard_id INT NOT NULL, counter_id INT NOT NULL, INDEX IDX_DCE1D8550253A7D (scorecard_id), INDEX IDX_DCE1D85FCEEF2E3 (counter_id), PRIMARY KEY(scorecard_id, counter_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_student (id INT NOT NULL, student_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_subject (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_teacher (id INT NOT NULL, main_domain VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_38B383A1F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_evaluation ADD CONSTRAINT FK_7A60EFE450253A7D FOREIGN KEY (scorecard_id) REFERENCES tbl_scorecard (id)');
        $this->addSql('ALTER TABLE tbl_evaluation ADD CONSTRAINT FK_7A60EFE4CB944F1A FOREIGN KEY (student_id) REFERENCES tbl_student (id)');
        $this->addSql('ALTER TABLE scorecard_counter ADD CONSTRAINT FK_DCE1D8550253A7D FOREIGN KEY (scorecard_id) REFERENCES tbl_scorecard (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scorecard_counter ADD CONSTRAINT FK_DCE1D85FCEEF2E3 FOREIGN KEY (counter_id) REFERENCES tbl_counter (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_student ADD CONSTRAINT FK_EC70A747BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_teacher ADD CONSTRAINT FK_EBA5AEA1BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE scorecard_counter DROP FOREIGN KEY FK_DCE1D85FCEEF2E3');
        $this->addSql('ALTER TABLE tbl_evaluation DROP FOREIGN KEY FK_7A60EFE450253A7D');
        $this->addSql('ALTER TABLE scorecard_counter DROP FOREIGN KEY FK_DCE1D8550253A7D');
        $this->addSql('ALTER TABLE tbl_evaluation DROP FOREIGN KEY FK_7A60EFE4CB944F1A');
        $this->addSql('ALTER TABLE tbl_student DROP FOREIGN KEY FK_EC70A747BF396750');
        $this->addSql('ALTER TABLE tbl_teacher DROP FOREIGN KEY FK_EBA5AEA1BF396750');
        $this->addSql('DROP TABLE tbl_counter');
        $this->addSql('DROP TABLE tbl_evaluation');
        $this->addSql('DROP TABLE tbl_scorecard');
        $this->addSql('DROP TABLE scorecard_counter');
        $this->addSql('DROP TABLE tbl_student');
        $this->addSql('DROP TABLE tbl_subject');
        $this->addSql('DROP TABLE tbl_teacher');
        $this->addSql('DROP TABLE tbl_user');
    }
}

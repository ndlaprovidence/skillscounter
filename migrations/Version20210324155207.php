<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324155207 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tbl_student (id INT NOT NULL, student_number VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_teacher (id INT NOT NULL, main_domain VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tbl_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_38B383A1F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tbl_student ADD CONSTRAINT FK_EC70A747BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tbl_teacher ADD CONSTRAINT FK_EBA5AEA1BF396750 FOREIGN KEY (id) REFERENCES tbl_user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_student DROP FOREIGN KEY FK_EC70A747BF396750');
        $this->addSql('ALTER TABLE tbl_teacher DROP FOREIGN KEY FK_EBA5AEA1BF396750');
        $this->addSql('DROP TABLE tbl_student');
        $this->addSql('DROP TABLE tbl_teacher');
        $this->addSql('DROP TABLE tbl_user');
    }
}

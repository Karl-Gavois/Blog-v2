<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230821132737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, rel_art_id INT DEFAULT NULL, rel_user_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, paragraph VARCHAR(255) NOT NULL, INDEX IDX_5F9E962A68FC912B (rel_art_id), INDEX IDX_5F9E962AF6540ADB (rel_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A68FC912B FOREIGN KEY (rel_art_id) REFERENCES articles (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF6540ADB FOREIGN KEY (rel_user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A68FC912B');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF6540ADB');
        $this->addSql('DROP TABLE comments');
    }
}

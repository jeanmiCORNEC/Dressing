<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413171130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD specificite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2745A6410E FOREIGN KEY (specificite_id) REFERENCES specificite (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2745A6410E ON produit (specificite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2745A6410E');
        $this->addSql('DROP INDEX IDX_29A5EC2745A6410E ON produit');
        $this->addSql('ALTER TABLE produit DROP specificite_id');
    }
}

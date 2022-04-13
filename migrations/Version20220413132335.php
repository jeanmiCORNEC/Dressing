<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413132335 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_specificite (produit_id INT NOT NULL, specificite_id INT NOT NULL, INDEX IDX_8039569BF347EFB (produit_id), INDEX IDX_8039569B45A6410E (specificite_id), PRIMARY KEY(produit_id, specificite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_specificite ADD CONSTRAINT FK_8039569BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_specificite ADD CONSTRAINT FK_8039569B45A6410E FOREIGN KEY (specificite_id) REFERENCES specificite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD type_id INT NOT NULL, ADD saison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27F965414C FOREIGN KEY (saison_id) REFERENCES saison (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27C54C8C93 ON produit (type_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27F965414C ON produit (saison_id)');
        $this->addSql('ALTER TABLE type ADD categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE type ADD CONSTRAINT FK_8CDE5729BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_8CDE5729BCF5E72D ON type (categorie_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produit_specificite');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27C54C8C93');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27F965414C');
        $this->addSql('DROP INDEX IDX_29A5EC27C54C8C93 ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC27F965414C ON produit');
        $this->addSql('ALTER TABLE produit DROP type_id, DROP saison_id');
        $this->addSql('ALTER TABLE type DROP FOREIGN KEY FK_8CDE5729BCF5E72D');
        $this->addSql('DROP INDEX IDX_8CDE5729BCF5E72D ON type');
        $this->addSql('ALTER TABLE type DROP categorie_id');
    }
}

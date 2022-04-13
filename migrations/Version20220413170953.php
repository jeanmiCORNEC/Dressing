<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413170953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_couleur (produit_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_FAF60C9CF347EFB (produit_id), INDEX IDX_FAF60C9CC31BA576 (couleur_id), PRIMARY KEY(produit_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_matiere (produit_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_56EFDC33F347EFB (produit_id), INDEX IDX_56EFDC33F46CD258 (matiere_id), PRIMARY KEY(produit_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_couleur ADD CONSTRAINT FK_FAF60C9CC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_matiere ADD CONSTRAINT FK_56EFDC33F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_matiere ADD CONSTRAINT FK_56EFDC33F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE produit_specificite');
        $this->addSql('ALTER TABLE produit ADD longeur_id INT NOT NULL, ADD manche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC2711C6877C FOREIGN KEY (longeur_id) REFERENCES longueur (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273E37BFAB FOREIGN KEY (manche_id) REFERENCES manche (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC2711C6877C ON produit (longeur_id)');
        $this->addSql('CREATE INDEX IDX_29A5EC273E37BFAB ON produit (manche_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_specificite (produit_id INT NOT NULL, specificite_id INT NOT NULL, INDEX IDX_8039569B45A6410E (specificite_id), INDEX IDX_8039569BF347EFB (produit_id), PRIMARY KEY(produit_id, specificite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_specificite ADD CONSTRAINT FK_8039569B45A6410E FOREIGN KEY (specificite_id) REFERENCES specificite (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_specificite ADD CONSTRAINT FK_8039569BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE produit_couleur');
        $this->addSql('DROP TABLE produit_matiere');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC2711C6877C');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273E37BFAB');
        $this->addSql('DROP INDEX IDX_29A5EC2711C6877C ON produit');
        $this->addSql('DROP INDEX IDX_29A5EC273E37BFAB ON produit');
        $this->addSql('ALTER TABLE produit DROP longeur_id, DROP manche_id');
    }
}

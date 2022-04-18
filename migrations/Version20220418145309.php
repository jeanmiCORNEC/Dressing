<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220418145309 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, nom VARCHAR(180) NOT NULL, prenom VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_categorie (user_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_499D5BD0A76ED395 (user_id), INDEX IDX_499D5BD0BCF5E72D (categorie_id), PRIMARY KEY(user_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_couleur (user_id INT NOT NULL, couleur_id INT NOT NULL, INDEX IDX_640099EFA76ED395 (user_id), INDEX IDX_640099EFC31BA576 (couleur_id), PRIMARY KEY(user_id, couleur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_longueur (user_id INT NOT NULL, longueur_id INT NOT NULL, INDEX IDX_9847B320A76ED395 (user_id), INDEX IDX_9847B320D0476395 (longueur_id), PRIMARY KEY(user_id, longueur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_manche (user_id INT NOT NULL, manche_id INT NOT NULL, INDEX IDX_C53C79D6A76ED395 (user_id), INDEX IDX_C53C79D63E37BFAB (manche_id), PRIMARY KEY(user_id, manche_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_matiere (user_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_C8194940A76ED395 (user_id), INDEX IDX_C8194940F46CD258 (matiere_id), PRIMARY KEY(user_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_produit (user_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_71A8F22DA76ED395 (user_id), INDEX IDX_71A8F22DF347EFB (produit_id), PRIMARY KEY(user_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_saison (user_id INT NOT NULL, saison_id INT NOT NULL, INDEX IDX_A582CEBBA76ED395 (user_id), INDEX IDX_A582CEBBF965414C (saison_id), PRIMARY KEY(user_id, saison_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_specificite (user_id INT NOT NULL, specificite_id INT NOT NULL, INDEX IDX_573ADB8AA76ED395 (user_id), INDEX IDX_573ADB8A45A6410E (specificite_id), PRIMARY KEY(user_id, specificite_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_type (user_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_F65F1BE0A76ED395 (user_id), INDEX IDX_F65F1BE0C54C8C93 (type_id), PRIMARY KEY(user_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_categorie ADD CONSTRAINT FK_499D5BD0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_categorie ADD CONSTRAINT FK_499D5BD0BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_couleur ADD CONSTRAINT FK_640099EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_couleur ADD CONSTRAINT FK_640099EFC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_longueur ADD CONSTRAINT FK_9847B320A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_longueur ADD CONSTRAINT FK_9847B320D0476395 FOREIGN KEY (longueur_id) REFERENCES longueur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_manche ADD CONSTRAINT FK_C53C79D6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_manche ADD CONSTRAINT FK_C53C79D63E37BFAB FOREIGN KEY (manche_id) REFERENCES manche (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_matiere ADD CONSTRAINT FK_C8194940A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_matiere ADD CONSTRAINT FK_C8194940F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_produit ADD CONSTRAINT FK_71A8F22DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_produit ADD CONSTRAINT FK_71A8F22DF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_saison ADD CONSTRAINT FK_A582CEBBA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_saison ADD CONSTRAINT FK_A582CEBBF965414C FOREIGN KEY (saison_id) REFERENCES saison (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specificite ADD CONSTRAINT FK_573ADB8AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_specificite ADD CONSTRAINT FK_573ADB8A45A6410E FOREIGN KEY (specificite_id) REFERENCES specificite (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_type ADD CONSTRAINT FK_F65F1BE0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_type ADD CONSTRAINT FK_F65F1BE0C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_categorie DROP FOREIGN KEY FK_499D5BD0A76ED395');
        $this->addSql('ALTER TABLE user_couleur DROP FOREIGN KEY FK_640099EFA76ED395');
        $this->addSql('ALTER TABLE user_longueur DROP FOREIGN KEY FK_9847B320A76ED395');
        $this->addSql('ALTER TABLE user_manche DROP FOREIGN KEY FK_C53C79D6A76ED395');
        $this->addSql('ALTER TABLE user_matiere DROP FOREIGN KEY FK_C8194940A76ED395');
        $this->addSql('ALTER TABLE user_produit DROP FOREIGN KEY FK_71A8F22DA76ED395');
        $this->addSql('ALTER TABLE user_saison DROP FOREIGN KEY FK_A582CEBBA76ED395');
        $this->addSql('ALTER TABLE user_specificite DROP FOREIGN KEY FK_573ADB8AA76ED395');
        $this->addSql('ALTER TABLE user_type DROP FOREIGN KEY FK_F65F1BE0A76ED395');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_categorie');
        $this->addSql('DROP TABLE user_couleur');
        $this->addSql('DROP TABLE user_longueur');
        $this->addSql('DROP TABLE user_manche');
        $this->addSql('DROP TABLE user_matiere');
        $this->addSql('DROP TABLE user_produit');
        $this->addSql('DROP TABLE user_saison');
        $this->addSql('DROP TABLE user_specificite');
        $this->addSql('DROP TABLE user_type');
    }
}

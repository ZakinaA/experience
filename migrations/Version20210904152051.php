<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210904152051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create etudiants table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etudiants (id INT AUTO_INCREMENT NOT NULL, departement_id INT NOT NULL, ville_id INT NOT NULL, name VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, INDEX IDX_54469DF4F92F3E70 (departement_id), INDEX IDX_54469DF48BAC62AF (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etudiants ADD CONSTRAINT FK_54469DF4F92F3E70 FOREIGN KEY (departement_id) REFERENCES departements (id)');
        $this->addSql('ALTER TABLE etudiants ADD CONSTRAINT FK_54469DF48BAC62AF FOREIGN KEY (ville_id) REFERENCES cities (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etudiants');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231009074148 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Trip registrations';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trip_registration (id INT AUTO_INCREMENT NOT NULL, participant_name VARCHAR(50) NOT NULL, participant_surname VARCHAR(50) NOT NULL, birth_date DATE NOT NULL, parent_phone VARCHAR(50) NOT NULL, acceptance_of_statement TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE trip_registration');
    }
}

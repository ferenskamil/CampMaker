<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231006080819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create organizer table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE organizer (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, full_name VARCHAR(255) NOT NULL, short_name VARCHAR(255) DEFAULT NULL, address1 VARCHAR(255) NOT NULL, address2 VARCHAR(255) NOT NULL, nip VARCHAR(20) DEFAULT NULL, account_no VARCHAR(50) NOT NULL, owner_name VARCHAR(50) NOT NULL, owner_surname VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_99D47173A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE organizer ADD CONSTRAINT FK_99D47173A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organizer DROP FOREIGN KEY FK_99D47173A76ED395');
        $this->addSql('DROP TABLE organizer');
    }
}

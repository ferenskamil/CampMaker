<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231009080230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Connect trip registrations(many) with event(one)';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trip_registration ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trip_registration ADD CONSTRAINT FK_6F31EC3E71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_6F31EC3E71F7E88B ON trip_registration (event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trip_registration DROP FOREIGN KEY FK_6F31EC3E71F7E88B');
        $this->addSql('DROP INDEX IDX_6F31EC3E71F7E88B ON trip_registration');
        $this->addSql('ALTER TABLE trip_registration DROP event_id');
    }
}

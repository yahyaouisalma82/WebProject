<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210515224953 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pet_for_adoption ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pet_for_adoption ADD CONSTRAINT FK_4CB5C4EA7E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4CB5C4EA7E3C61F9 ON pet_for_adoption (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pet_for_adoption DROP FOREIGN KEY FK_4CB5C4EA7E3C61F9');
        $this->addSql('DROP INDEX IDX_4CB5C4EA7E3C61F9 ON pet_for_adoption');
        $this->addSql('ALTER TABLE pet_for_adoption DROP owner_id');
    }
}

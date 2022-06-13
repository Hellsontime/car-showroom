<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220613085027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars_showroom ADD model_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cars_showroom ADD CONSTRAINT FK_626C105D7975B7E7 FOREIGN KEY (model_id) REFERENCES vehicles_directory (id)');
        $this->addSql('CREATE INDEX IDX_626C105D7975B7E7 ON cars_showroom (model_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cars_showroom DROP FOREIGN KEY FK_626C105D7975B7E7');
        $this->addSql('DROP INDEX IDX_626C105D7975B7E7 ON cars_showroom');
        $this->addSql('ALTER TABLE cars_showroom DROP model_id');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250203121747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'this is updated migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher CHANGE name name VARCHAR(255) NOT NULL, CHANGE father_name father_name VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teacher CHANGE name name LONGTEXT NOT NULL, CHANGE father_name father_name LONGTEXT NOT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL');
    }
}

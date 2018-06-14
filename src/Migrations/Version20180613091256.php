<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613091256 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reportage ADD category_id INT NOT NULL, DROP category');
        $this->addSql('ALTER TABLE reportage ADD CONSTRAINT FK_8CA3714212469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_8CA3714212469DE2 ON reportage (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reportage DROP FOREIGN KEY FK_8CA3714212469DE2');
        $this->addSql('DROP INDEX IDX_8CA3714212469DE2 ON reportage');
        $this->addSql('ALTER TABLE reportage ADD category VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP category_id');
    }
}

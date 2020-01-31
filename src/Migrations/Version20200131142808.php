<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200131142808 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post ADD sujet_id INT NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D7C4D497E FOREIGN KEY (sujet_id) REFERENCES sujet (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D7C4D497E ON post (sujet_id)');
        $this->addSql('ALTER TABLE sujet ADD forum_id INT NOT NULL');
        $this->addSql('ALTER TABLE sujet ADD CONSTRAINT FK_2E13599D29CCBAD0 FOREIGN KEY (forum_id) REFERENCES forum (id)');
        $this->addSql('CREATE INDEX IDX_2E13599D29CCBAD0 ON sujet (forum_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D7C4D497E');
        $this->addSql('DROP INDEX IDX_5A8A6C8D7C4D497E ON post');
        $this->addSql('ALTER TABLE post DROP sujet_id');
        $this->addSql('ALTER TABLE sujet DROP FOREIGN KEY FK_2E13599D29CCBAD0');
        $this->addSql('DROP INDEX IDX_2E13599D29CCBAD0 ON sujet');
        $this->addSql('ALTER TABLE sujet DROP forum_id');
    }
}

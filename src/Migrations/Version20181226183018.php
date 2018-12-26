<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181226183018 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE News');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) NOT NULL, CHANGE slug slug VARCHAR(100) NOT NULL, CHANGE is_published is_published TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE post CHANGE title title VARCHAR(255) NOT NULL, CHANGE slug slug VARCHAR(255) NOT NULL, CHANGE body body LONGTEXT DEFAULT NULL, CHANGE category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D12469DE2 ON post (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE News (news_id INT AUTO_INCREMENT NOT NULL, news_title VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, news_body VARCHAR(5000) NOT NULL COLLATE latin1_swedish_ci, PRIMARY KEY(news_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category CHANGE name name VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE is_published is_published TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8D12469DE2');
        $this->addSql('DROP INDEX IDX_5A8A6C8D12469DE2 ON post');
        $this->addSql('ALTER TABLE post CHANGE category_id category_id INT DEFAULT NULL, CHANGE title title VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE slug slug VARCHAR(255) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE body body VARCHAR(500) DEFAULT NULL COLLATE latin1_swedish_ci');
    }
}

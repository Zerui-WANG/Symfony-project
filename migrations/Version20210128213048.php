<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210128213048 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_question (game_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_1DB3B668E48FD905 (game_id), INDEX IDX_1DB3B6681E27F6BF (question_id), PRIMARY KEY(game_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game_question ADD CONSTRAINT FK_1DB3B668E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_question ADD CONSTRAINT FK_1DB3B6681E27F6BF FOREIGN KEY (question_id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92BF396750 FOREIGN KEY (id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A251E27F6BF FOREIGN KEY (question_id) REFERENCES `question` (id)');
        $this->addSql('CREATE INDEX IDX_DADD4A251E27F6BF ON answer (question_id)');
        $this->addSql('ALTER TABLE event CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7BF396750 FOREIGN KEY (id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD game_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E48FD905 ON user (game_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE game_question');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92BF396750');
        $this->addSql('ALTER TABLE action CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE answer DROP FOREIGN KEY FK_DADD4A251E27F6BF');
        $this->addSql('DROP INDEX IDX_DADD4A251E27F6BF ON answer');
        $this->addSql('ALTER TABLE answer DROP question_id');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7BF396750');
        $this->addSql('ALTER TABLE event CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE `question` DROP type');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E48FD905');
        $this->addSql('DROP INDEX UNIQ_8D93D649E48FD905 ON user');
        $this->addSql('ALTER TABLE user DROP game_id');
    }
    public function isTransactional(): bool
    {
        return false;
    }
}

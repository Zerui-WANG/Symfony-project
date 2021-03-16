<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210314162443 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE game_question');
        $this->addSql('ALTER TABLE question ADD game_id INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('CREATE INDEX IDX_B6F7494EE48FD905 ON question (game_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_question (game_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_1DB3B6681E27F6BF (question_id), INDEX IDX_1DB3B668E48FD905 (game_id), PRIMARY KEY(game_id, question_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE game_question ADD CONSTRAINT FK_1DB3B6681E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game_question ADD CONSTRAINT FK_1DB3B668E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `question` DROP FOREIGN KEY FK_B6F7494EE48FD905');
        $this->addSql('DROP INDEX IDX_B6F7494EE48FD905 ON `question`');
        $this->addSql('ALTER TABLE `question` DROP game_id');
    }
}

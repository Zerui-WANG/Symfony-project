<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210320184958 extends AbstractMigration
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
        $this->addSql('DROP TABLE question_game');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question_game (question_id INT NOT NULL, game_id INT NOT NULL, INDEX IDX_7DC5DC631E27F6BF (question_id), INDEX IDX_7DC5DC63E48FD905 (game_id), PRIMARY KEY(question_id, game_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE question_game ADD CONSTRAINT FK_7DC5DC631E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_game ADD CONSTRAINT FK_7DC5DC63E48FD905 FOREIGN KEY (game_id) REFERENCES game (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE game_question');
    }
}

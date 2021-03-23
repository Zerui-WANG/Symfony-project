<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210323174936 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT NOT NULL, duration INT NOT NULL, action_period INT NOT NULL, is_available TINYINT(1) NOT NULL, app VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer (id INT AUTO_INCREMENT NOT NULL, description_answer VARCHAR(1024) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_effect_student (answer_id INT NOT NULL, effect_student_id INT NOT NULL, INDEX IDX_C1B8D7AAA334807 (answer_id), INDEX IDX_C1B8D7A1BE3DC9C (effect_student_id), PRIMARY KEY(answer_id, effect_student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_effect_player (answer_id INT NOT NULL, effect_player_id INT NOT NULL, INDEX IDX_AB7C30D0AA334807 (answer_id), INDEX IDX_AB7C30D08E63843A (effect_player_id), PRIMARY KEY(answer_id, effect_player_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE answer_question (answer_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_91BD482BAA334807 (answer_id), INDEX IDX_91BD482B1E27F6BF (question_id), PRIMARY KEY(answer_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effect_player (id INT AUTO_INCREMENT NOT NULL, value_effect_player INT NOT NULL, characteristic_player VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE effect_student (id INT AUTO_INCREMENT NOT NULL, value_effect_student INT NOT NULL, characteristic_student VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, cooldown INT NOT NULL, frequency INT NOT NULL, cooldown_min INT NOT NULL, cooldown_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE game (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, turn INT NOT NULL, day_time INT NOT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_232B318C99E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player (id INT AUTO_INCREMENT NOT NULL, mood INT NOT NULL, sleep INT NOT NULL, pedagogy INT NOT NULL, charisma INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `question` (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, name_question VARCHAR(255) NOT NULL, description_question VARCHAR(1024) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_B6F7494EE48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, game_id INT NOT NULL, attendance INT NOT NULL, personality INT NOT NULL, grade INT DEFAULT NULL, is_failure TINYINT(1) NOT NULL, is_present TINYINT(1) NOT NULL, INDEX IDX_B723AF33E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, game_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, pseudo VARCHAR(64) NOT NULL, is_validate TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649E48FD905 (game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C92BF396750 FOREIGN KEY (id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_effect_student ADD CONSTRAINT FK_C1B8D7AAA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_effect_student ADD CONSTRAINT FK_C1B8D7A1BE3DC9C FOREIGN KEY (effect_student_id) REFERENCES effect_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_effect_player ADD CONSTRAINT FK_AB7C30D0AA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_effect_player ADD CONSTRAINT FK_AB7C30D08E63843A FOREIGN KEY (effect_player_id) REFERENCES effect_player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_question ADD CONSTRAINT FK_91BD482BAA334807 FOREIGN KEY (answer_id) REFERENCES answer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE answer_question ADD CONSTRAINT FK_91BD482B1E27F6BF FOREIGN KEY (question_id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7BF396750 FOREIGN KEY (id) REFERENCES `question` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id)');
        $this->addSql('ALTER TABLE `question` ADD CONSTRAINT FK_B6F7494EE48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE student ADD CONSTRAINT FK_B723AF33E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E48FD905 FOREIGN KEY (game_id) REFERENCES game (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answer_effect_student DROP FOREIGN KEY FK_C1B8D7AAA334807');
        $this->addSql('ALTER TABLE answer_effect_player DROP FOREIGN KEY FK_AB7C30D0AA334807');
        $this->addSql('ALTER TABLE answer_question DROP FOREIGN KEY FK_91BD482BAA334807');
        $this->addSql('ALTER TABLE answer_effect_player DROP FOREIGN KEY FK_AB7C30D08E63843A');
        $this->addSql('ALTER TABLE answer_effect_student DROP FOREIGN KEY FK_C1B8D7A1BE3DC9C');
        $this->addSql('ALTER TABLE `question` DROP FOREIGN KEY FK_B6F7494EE48FD905');
        $this->addSql('ALTER TABLE student DROP FOREIGN KEY FK_B723AF33E48FD905');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E48FD905');
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C99E6F5DF');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C92BF396750');
        $this->addSql('ALTER TABLE answer_question DROP FOREIGN KEY FK_91BD482B1E27F6BF');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7BF396750');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE answer_effect_student');
        $this->addSql('DROP TABLE answer_effect_player');
        $this->addSql('DROP TABLE answer_question');
        $this->addSql('DROP TABLE effect_player');
        $this->addSql('DROP TABLE effect_student');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE `question`');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP TABLE user');
    }
}

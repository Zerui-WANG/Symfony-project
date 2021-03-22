<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210322175820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE player_effect_player');
        $this->addSql('DROP TABLE student_effect_student');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE player_effect_player (player_id INT NOT NULL, effect_player_id INT NOT NULL, INDEX IDX_303A694F8E63843A (effect_player_id), INDEX IDX_303A694F99E6F5DF (player_id), PRIMARY KEY(player_id, effect_player_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE student_effect_student (student_id INT NOT NULL, effect_student_id INT NOT NULL, INDEX IDX_B70BF0A41BE3DC9C (effect_student_id), INDEX IDX_B70BF0A4CB944F1A (student_id), PRIMARY KEY(student_id, effect_student_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE player_effect_player ADD CONSTRAINT FK_303A694F8E63843A FOREIGN KEY (effect_player_id) REFERENCES effect_player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_effect_player ADD CONSTRAINT FK_303A694F99E6F5DF FOREIGN KEY (player_id) REFERENCES player (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_effect_student ADD CONSTRAINT FK_B70BF0A41BE3DC9C FOREIGN KEY (effect_student_id) REFERENCES effect_student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_effect_student ADD CONSTRAINT FK_B70BF0A4CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
    }
}

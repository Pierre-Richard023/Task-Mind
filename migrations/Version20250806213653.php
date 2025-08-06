<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250806213653 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, project_id INT DEFAULT NULL, task_id INT DEFAULT NULL, content LONGTEXT NOT NULL, publication_date DATE NOT NULL, INDEX IDX_5F9E962AF675F31B (author_id), INDEX IDX_5F9E962A166D1F9C (project_id), INDEX IDX_5F9E962A8DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE files (id INT AUTO_INCREMENT NOT NULL, project_id INT DEFAULT NULL, task_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_6354059166D1F9C (project_id), INDEX IDX_63540598DB60186 (task_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, message LONGTEXT NOT NULL, view TINYINT(1) NOT NULL, type VARCHAR(255) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, manager_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, start DATE DEFAULT NULL, end DATE DEFAULT NULL, lastupdate DATETIME NOT NULL, join_code VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EE783E3463 (manager_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE task (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, start DATE DEFAULT NULL, end DATE DEFAULT NULL, state VARCHAR(255) NOT NULL, INDEX IDX_527EDB25166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962AF675F31B FOREIGN KEY (author_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A8DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_6354059166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_63540598DB60186 FOREIGN KEY (task_id) REFERENCES task (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE783E3463 FOREIGN KEY (manager_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962AF675F31B');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A166D1F9C');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A8DB60186');
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_6354059166D1F9C');
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_63540598DB60186');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE783E3463');
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB25166D1F9C');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE files');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE task');
    }
}

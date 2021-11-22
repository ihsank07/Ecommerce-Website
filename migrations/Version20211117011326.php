<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117011326 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_shopping_cart (order_id INT NOT NULL, shopping_cart_id INT NOT NULL, INDEX IDX_DFC99C248D9F6D38 (order_id), INDEX IDX_DFC99C2445F80CD (shopping_cart_id), PRIMARY KEY(order_id, shopping_cart_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_shopping_cart ADD CONSTRAINT FK_DFC99C248D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_shopping_cart ADD CONSTRAINT FK_DFC99C2445F80CD FOREIGN KEY (shopping_cart_id) REFERENCES shopping_cart (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE order_shopping_cart');
    }
}

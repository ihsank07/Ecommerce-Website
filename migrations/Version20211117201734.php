<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211117201734 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_product (id INT AUTO_INCREMENT NOT NULL, productname VARCHAR(255) NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_product_shopping_cart (order_product_id INT NOT NULL, shopping_cart_id INT NOT NULL, INDEX IDX_9D4CA4A8F65E9B0F (order_product_id), INDEX IDX_9D4CA4A845F80CD (shopping_cart_id), PRIMARY KEY(order_product_id, shopping_cart_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE order_product_shopping_cart ADD CONSTRAINT FK_9D4CA4A8F65E9B0F FOREIGN KEY (order_product_id) REFERENCES order_product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_product_shopping_cart ADD CONSTRAINT FK_9D4CA4A845F80CD FOREIGN KEY (shopping_cart_id) REFERENCES shopping_cart (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_product_shopping_cart DROP FOREIGN KEY FK_9D4CA4A8F65E9B0F');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE order_product_shopping_cart');
    }
}

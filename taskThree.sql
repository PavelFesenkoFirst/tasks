/*Завдання №3:
Створіть структуру бази даних маючи такі сутності та поля:
- категорії (назва);
- товари (назва, ціна);
- характеристики (назва, значення);

І виходячи з вимог:
- у категорій може бути нескінченна вкладеність;
- товар може належати тільки одній категорії;
- у товару може бути кілька характеристик;
- у кожної характеристики може бути різне значення. */

-- створюємо таблиую Категорій
CREATE TABLE categories (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  parent_id INT,
  PRIMARY KEY (id),
  FOREIGN KEY (parent_id) REFERENCES categories(id)
);

-- створюємо таблиую Продуктів
CREATE TABLE products (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  category_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- створюємо таблиую Характеристик
CREATE TABLE characteristics (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

-- створюємо таблиую Опис для характеристик
CREATE TABLE product_characteristics (
  id INT NOT NULL AUTO_INCREMENT,
  characteristic_id INT NOT NULL,
  product_id INT NOT NULL,
  value VARCHAR(255),
  PRIMARY KEY (id),
  FOREIGN KEY (characteristic_id) REFERENCES characteristics(id),
  FOREIGN KEY (product_id) REFERENCES products(id)
);
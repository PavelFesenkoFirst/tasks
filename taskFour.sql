-- Завдання №4:
-- Напишіть запит, який виведе назву категорії, назву та ціну товару, ціна якого є найвищою.

SELECT c.name AS category_name, p.name AS product_name, p.price
FROM products p
INNER JOIN categories c ON p.category_id = c.id
WHERE p.price = (
  SELECT MAX(price) FROM products
);
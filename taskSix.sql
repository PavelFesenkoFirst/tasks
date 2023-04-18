/*Завдання №6:
Напишіть запит, який виведе список найменувань товару та його ціни, 
ціна якого знаходиться в межах від 100 до 200 включно і назва категорії закінчується текстом "ama” */

SELECT p.name, p.price, c.name AS category_name
FROM products p
INNER JOIN categories c ON p.category_id = c.id
WHERE p.price BETWEEN 100 AND 200
AND c.name LIKE '%ama';
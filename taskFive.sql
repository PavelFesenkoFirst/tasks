/*Завдання №5:
Напишіть запит, який виведе список, що складається з назви характеристики та кількості товару, 
який має цю характеристику, відсортований за кількістю від більшого до меншого. */

SELECT c.name AS characteristic_name, COUNT(pc.product_id) AS product_count
FROM characteristics c
INNER JOIN product_characteristics pc ON c.id = pc.characteristic_id
GROUP BY c.id
ORDER BY product_count DESC;
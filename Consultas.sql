#Consulta del producto con mayor stock
amount_to_sell
SELECT * FROM cafeteria.product
where stock = (select max(stock) FROM cafeteria.product)


#Productos mas vendidos
SELECT *, sum(amount_to_sell) as total
FROM cafeteria.sale_product
group by product_id


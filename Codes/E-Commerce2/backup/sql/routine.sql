DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_charge` (`charge_id` VARCHAR(60), `oid` INT, `trans_type` VARCHAR(18), `amt` INT(10), `charge` TEXT)  BEGIN
  INSERT INTO charges VALUES (NULL, charge_id, oid, trans_type, amt, charge, NOW());
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_customer` (`e` VARCHAR(80), `f` VARCHAR(20), `l` VARCHAR(40), `a1` VARCHAR(80), `a2` VARCHAR(80), `c` VARCHAR(60), `s` CHAR(2), `z` MEDIUMINT, `p` INT, OUT `cid` INT)  BEGIN
  INSERT INTO customers (email, first_name, last_name, address1, address2, city, state, zip, phone) VALUES (e, f, l, a1, a2, c, s, z, p);
	SELECT LAST_INSERT_ID() INTO cid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_order` (`cid` INT, `uid` CHAR(32), `ship` INT(10), `cc` MEDIUMINT, OUT `total` INT(10), OUT `oid` INT)  BEGIN
	DECLARE subtotal INT(10);
	INSERT INTO orders (customer_id, shipping, credit_card_number, order_date) VALUES (cid, ship, cc, NOW());
	SELECT LAST_INSERT_ID() INTO oid;
	INSERT INTO order_contents (order_id, product_type, product_id, quantity, price_per) SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, ncp.price) FROM carts AS c INNER JOIN non_coffee_products AS ncp ON c.product_id=ncp.id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="goodies" AND c.user_session_id=uid UNION SELECT oid, c.product_type, c.product_id, c.quantity, IFNULL(sales.price, sc.price) FROM carts AS c INNER JOIN specific_coffees AS sc ON c.product_id=sc.id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="coffee" AND c.user_session_id=uid;
	SELECT SUM(quantity*price_per) INTO subtotal FROM order_contents WHERE order_id=oid;
	UPDATE orders SET total = (subtotal + ship) WHERE id=oid;
	SELECT (subtotal + ship) INTO total;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_review` (`type` VARCHAR(7), `pid` MEDIUMINT, `n` VARCHAR(60), `e` VARCHAR(80), `r` TEXT)  BEGIN
  INSERT INTO reviews (product_type, product_id, name, email, review) VALUES (type, pid, n, e, r);
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_to_cart` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT, `qty` TINYINT)  BEGIN
DECLARE cid INT;
SELECT id INTO cid FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
IF cid > 0 THEN
UPDATE carts SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
ELSE 
INSERT INTO carts (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_to_wish_list` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT, `qty` TINYINT)  BEGIN
DECLARE cid INT;
SELECT id INTO cid FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
IF cid > 0 THEN
UPDATE wish_lists SET quantity=quantity+qty, date_modified=NOW() WHERE id=cid;
ELSE 
INSERT INTO wish_lists (user_session_id, product_type, product_id, quantity) VALUES (uid, type, pid, qty);
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `add_transaction` (`oid` INT, `trans_type` VARCHAR(18), `amt` INT(10), `rc` TINYINT, `rrc` TINYTEXT, `tid` BIGINT, `r` TEXT)  BEGIN
	INSERT INTO transactions VALUES (NULL, oid, trans_type, amt, rc, rrc, tid, r, NOW());
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `clear_cart` (`uid` CHAR(32))  BEGIN
	DELETE FROM carts WHERE user_session_id=uid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `get_order_contents` (`oid` INT)  BEGIN
SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per) AS subtotal, ncc.category, ncp.name, o.total, o.shipping FROM order_contents AS oc INNER JOIN non_coffee_products AS ncp ON oc.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id INNER JOIN orders AS o ON oc.order_id=o.id WHERE oc.product_type="goodies" AND oc.order_id=oid UNION SELECT oc.quantity, oc.price_per, (oc.quantity*oc.price_per), gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), o.total, o.shipping FROM order_contents AS oc INNER JOIN specific_coffees AS sc ON oc.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id INNER JOIN orders AS o ON oc.order_id=o.id  WHERE oc.product_type="coffee" AND oc.order_id=oid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `get_shopping_cart_contents` (`uid` CHAR(32))  BEGIN
SELECT CONCAT("G", ncp.id) AS sku, c.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM carts AS c INNER JOIN non_coffee_products AS ncp ON c.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="goodies" AND c.user_session_id=uid UNION SELECT CONCAT("C", sc.id), c.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM carts AS c INNER JOIN specific_coffees AS sc ON c.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE c.product_type="coffee" AND c.user_session_id=uid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `get_wish_list_contents` (`uid` CHAR(32))  BEGIN
SELECT CONCAT("G", ncp.id) AS sku, wl.quantity, ncc.category, ncp.name, ncp.price, ncp.stock, sales.price AS sale_price FROM wish_lists AS wl INNER JOIN non_coffee_products AS ncp ON wl.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id LEFT OUTER JOIN sales ON (sales.product_id=ncp.id AND sales.product_type='goodies' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="goodies" AND wl.user_session_id=uid UNION SELECT CONCAT("C", sc.id), wl.quantity, gc.category, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, sales.price FROM wish_lists AS wl INNER JOIN specific_coffees AS sc ON wl.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id LEFT OUTER JOIN sales ON (sales.product_id=sc.id AND sales.product_type='coffee' AND ((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) WHERE wl.product_type="coffee" AND wl.user_session_id=uid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `remove_from_cart` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT)  BEGIN
DELETE FROM carts WHERE user_session_id=uid AND product_type=type AND product_id=pid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `remove_from_wish_list` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT)  BEGIN
DELETE FROM wish_lists WHERE user_session_id=uid AND product_type=type AND product_id=pid;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `select_categories` (`type` VARCHAR(7))  BEGIN
IF type = 'coffee' THEN
SELECT * FROM general_coffees ORDER by category;
ELSEIF type = 'goodies' THEN
SELECT * FROM non_coffee_categories ORDER by category;
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `select_products` (`type` VARCHAR(7), `cat` TINYINT)  BEGIN
IF type = 'coffee' THEN
SELECT gc.description, gc.image, CONCAT("C", sc.id) AS sku, 
CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole, CONCAT("$", FORMAT(sc.price/100, 2))) AS name, 
sc.stock, sc.price, sales.price AS sale_price 
FROM specific_coffees AS sc INNER JOIN sizes AS s ON s.id=sc.size_id 
INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id 
LEFT OUTER JOIN sales ON (sales.product_id=sc.id 
AND sales.product_type='coffee' AND 
((NOW() BETWEEN sales.start_date AND sales.end_date) 
OR (NOW() > sales.start_date AND sales.end_date IS NULL)) ) 
WHERE general_coffee_id=cat AND stock>0 
ORDER by name;
ELSEIF type = 'goodies' THEN
SELECT ncc.description AS g_description, ncc.image AS g_image, 
CONCAT("G", ncp.id) AS sku, ncp.name, ncp.description, ncp.image, ncp.price, ncp.stock, sales.price AS sale_price
FROM non_coffee_products AS ncp INNER JOIN non_coffee_categories AS ncc 
ON ncc.id=ncp.non_coffee_category_id 
LEFT OUTER JOIN sales ON (sales.product_id=ncp.id 
AND sales.product_type='goodies' AND 
((NOW() BETWEEN sales.start_date AND sales.end_date) OR (NOW() > sales.start_date AND sales.end_date IS NULL)) )
WHERE non_coffee_category_id=cat ORDER by date_created DESC;
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `select_reviews` (`type` VARCHAR(7), `pid` MEDIUMINT)  BEGIN
IF type = 'coffee' THEN
SELECT review FROM reviews WHERE type='coffee' AND product_id=pid ORDER by date_created DESC;
ELSEIF type = 'goodies' THEN
SELECT review FROM reviews WHERE type='goodies' AND product_id=pid ORDER by date_created DESC;
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `select_sale_items` (`get_all` BOOLEAN)  BEGIN
IF get_all = 1 THEN 
SELECT CONCAT("G", ncp.id) AS sku, sa.price AS sale_price, ncc.category, ncp.image, ncp.name, ncp.price AS price, ncp.stock, ncp.description FROM sales AS sa INNER JOIN non_coffee_products AS ncp ON sa.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id WHERE sa.product_type="goodies" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) )
UNION SELECT CONCAT("C", sc.id), sa.price, gc.category, gc.image, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, gc.description FROM sales AS sa INNER JOIN specific_coffees AS sc ON sa.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id WHERE sa.product_type="coffee" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) );
ELSE 
(SELECT CONCAT("G", ncp.id) AS sku, CONCAT("$", FORMAT(sa.price/100, 2)) AS sale_price, ncc.category, ncp.image, ncp.name FROM sales AS sa INNER JOIN non_coffee_products AS ncp ON sa.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id WHERE sa.product_type="goodies" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) ORDER BY RAND() LIMIT 2) UNION (SELECT CONCAT("C", sc.id), CONCAT("$", FORMAT(sa.price/100, 2)), gc.category, gc.image, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole) FROM sales AS sa INNER JOIN specific_coffees AS sc ON sa.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id WHERE sa.product_type="coffee" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) ORDER BY RAND() LIMIT 2);
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `update_cart` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT, `qty` TINYINT)  BEGIN
IF qty > 0 THEN
UPDATE carts SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
ELSEIF qty = 0 THEN
CALL remove_from_cart (uid, type, pid);
END IF;
END$$

CREATE DEFINER=`sphotonkhan`@`localhost` PROCEDURE `update_wish_list` (`uid` CHAR(32), `type` VARCHAR(7), `pid` MEDIUMINT, `qty` TINYINT)  BEGIN
IF qty > 0 THEN
UPDATE wish_lists SET quantity=qty, date_modified=NOW() WHERE user_session_id=uid AND product_type=type AND product_id=pid;
ELSEIF qty = 0 THEN
CALL remove_from_wish_list (uid, type, pid);
END IF;
END$$

DELIMITER ;
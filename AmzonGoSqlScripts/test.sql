#Show Inventory of Store 1
SELECT ITEM.*, InventoryQuantity FROM ITEM LEFT JOIN STOREINVENTORY
	ON ITEM.Itemno = STOREINVENTORY.InventoryId
WHERE storeNo = 1;

#Show Inventory of Store 2
SELECT ITEM.*, InventoryQuantity FROM ITEM LEFT JOIN STOREINVENTORY
	ON ITEM.Itemno = STOREINVENTORY.InventoryId
WHERE storeNo = 2;

#Show Inventory of Store 3
SELECT ITEM.*, InventoryQuantity FROM ITEM LEFT JOIN STOREINVENTORY
	ON ITEM.Itemno = STOREINVENTORY.InventoryId
WHERE storeNo = 3;


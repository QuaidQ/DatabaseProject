/* join tables based on ID and StoreNO, will be used when customer at a store is  looking at the inventory to buy items */

select item.*, storeinventory.*
from item, storeinventory
where item.itemno = storeinventory.inventoryid and storeNO=1'



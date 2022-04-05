## Burger Store Laravel
Simple Burger Store where you can order your burguer and pay on delivery

# Todos 

### Login
- [x] Create login system with breeze

### Categories 
- [x] Create categories migration model, controller
  - [x] Categories migration with name
  - [x] Create Categories
  - [x] Show Categories
  - [x] Update Categories
  - [x] Delete categories

### Products
- [x] Create Products table, model, controller
  - [x] migration( name, price, description, category )
  - [x] Create Product
  - [x] Show Product
  - [x] Update Product
  - [x] Delete Product
  - [x] ProductFactory 
  - [x] model relationship with category
  - [x] model relationship with images

### Images
- [x] Create Imagens table, model
  - [x] migration (path, product_id)
  - [x] Upload images for a product
  - [x] Remove image for a product
  

## Protect Cruds (Product, Images, Categories) with auth middleware
 - [x] Use middleware auth to protect cruds

### Cart System
- [ ] Show cart
- [ ] Insert in the cart
- [ ] Delete from cart

### Checkout and Orders
#### inputs
  - [x] Name
  - [x] Phone number
  - [x] Payment method (pay on delivery cash, pay on delivery credit card)
- [ ] Cart
  - [ ] Send itens by text, with product name quantity and price like a ticket
  - [x] Total price
  - [x] Observation about the delivery ( without lettuce... )
  - [x] Address (street, number)
  - [x] Address_complement

## Orders 
It will generate an order id, and the user must to see the status of the id
(Aguardando, em preparo, enviado, concluído) 
['pending', 'processing', 'shipped', 'delivered', 'canceled']
- [x] All the data above in 'inputs'
- [x] order status
- [x] update status and delete order
- [x] customer see their order
- [x] admin see all orders
- [ ] Notify client about the order status
  - [ ] Notify when order updated status
  - [ ] send text message to the customer, when a order status change




## Views Use component 
- [ ] Create Components in the view
- [ ] Use tailwind instead bootstrap 
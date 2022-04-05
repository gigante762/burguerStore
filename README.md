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
- [ ] Buyer 
  - [ ] Name
  - [ ] Phone number
- [ ] Payment
  - [ ] Payment method (pay on delivery cash, pay on delivery credit card)
  - [ ] Price
- [ ] Cart
  - [ ] Send itens by text, with product name quantity and price like a ticket
  - [ ] Total price
  - [ ] Observation about the delivery ( without lettuce... )
- [ ] Address
  - [ ] street
  - [ ] number
  - [ ] complement

## Orders 
It will generate an order id, and the user must to see the status of the id
(Aguardando, em preparo, enviado, concluído) 
['pending', 'processing', 'shipped', 'delivered', 'canceled']
- [x] All the data above in 'inputs'
- [x] order status
- [x] update status and delete order
- [ ] send text message to the customer,when a order status change





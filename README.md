## Burger Store Laravel
Simple Burger Store where you can order your burguer and pay on delivery

# Todos 

### Login
- [ ] Create login system with breeze

### Categories 
- [ ] Create categories migration model, controller
  - [ ] Categories migration with name
  - [ ] Create Categories
  - [ ] Show Categories
  - [ ] Update Categories
  - [ ] Delete categories

### Products
- [ ] Create Products table, model, controller
  - [ ] migration( name, price, description, category )
  - [ ] ProductFactory 
  - [ ] model relationship with category
  - [ ] model relationship with images

### Images
- [ ] Create Imagens table, model
  - [ ] migration (path, product_id)

## Protect Cruds (Product, Images, Categories) with auth middleware
 - [ ] Use middleware auth to protect cruds

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
- [ ] All the data above in 'inputs'
- [ ] order status




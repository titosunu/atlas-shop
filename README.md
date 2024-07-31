<h1 align="center">Atlas Shop, Laravel E-commerce</h1>

<p align="left">
Atlas Thrift Shop is a web-based e-commerce application built using Laravel. This application is designed to facilitate the sale of thrift items with features that ease transactions and shipping.

Features
- User Authentication: Registration, login, and user management.
- Product Management: Easily add, edit, and delete products.
- Category Management: Organize products into categories for easier browsing.
- Shopping Cart: Users can add products to their shopping cart.
- Checkout: Integrated with Midtrans for payment processing.
- Shipping Cost Calculation: Integrated with RajaOngkir to determine shipping costs based on location.
- Comments and Ratings: Users can leave comments and rate products.

1. **Clone the repository:**
   ```sh
   git clone https://github.com/yourusername/atlas-shop.git
   cd atlas-shop
   ```

2. **Install dependencies:**
   ```sh
   composer install
   npm install
   ```
     
3. **Set up the environment file:**
   Copy the .env.example file to .env and update the environment variables to match your configuration.
   ```sh
   cp .env.example .env
   ```

4. **Set up the database:**
   ```sh
   php artisan migrate --seed
   ```

5. **Install frontend dependencies and build assets:**
   ```sh
   npm install
   npm run dev
   ```

6. **Run the application:**
   ```sh
   php artisan serve
   ```

</p>

<h3 align="left">Languages and Tools:</h3>
<p align="left">
  <a href="https://www.php.net/" target="_blank" rel="noreferrer"> 
    <img src="https://www.svgrepo.com/show/303656/php-logo.svg" alt="go" width="40" height="40"/> 
  </a>
  <a href="https://laravel.com/" target="_blank" rel="noreferrer"> 
    <img src="https://pbs.twimg.com/profile_images/1783560208704241664/8skfbzIV_400x400.jpg" alt="go" width="40" height="40"/> 
  </a>
  <a href="https://getbootstrap.com/" target="_blank" rel="noreferrer"> 
    <img src="https://d3mxt5v3yxgcsr.cloudfront.net/courses/17101/course_17101_image.jpg" alt="go" width="40" height="40"/> 
  </a>
  <a href="https://www.javascript.com/" target="_blank" rel="noreferrer"> 
    <img src="https://e7.pngegg.com/pngimages/87/538/png-clipart-javascript-scalable-graphics-logo-encapsulated-postscript-javascript-icon-text-logo.png" alt="go" width="40" height="40"/> 
  </a>
</p>

<br>

![img-atlas](https://github.com/titosunu/laravel-commerce/blob/main/public/img/img.png)

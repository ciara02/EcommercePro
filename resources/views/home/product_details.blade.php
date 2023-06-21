<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">

      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Ecommerce Site</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="Homepage/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="Homepage/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="Homepage/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="Homepage/css/responsive.css" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
        @include('home.header')


      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%">
    
           <div class="img-box" style="padding: 20px">
              <img src="images/{{$products->image}}" alt="">
           </div>
           <div class="detail-box">
              <h5 >
                  {{$products->title}}
              </h5>
              <br>
              @if ($products->discount_price!=null)

              <h6 style="text-decoration: line-through; color:blue">
                  Price:
                  ₱{{$products->price}}
              </h6>

              <br>

              <h6 style="color: red">
               Discount price:
               ₱{{$products->discount_price}}
           </h6>

              @else
              <h6 style="color: blue">
                  Price:
                  ₱{{$products->price}}
              </h6>

              @endif
              <div>
              <br>
              <h6>Product Category:  {{$products->category}}</h6>

              <br>
              <h6>Product Description: {{$products->description}}</h6>

              <br>
              <h6>Product Quantity: {{$products->quantity}}</h6>
              <br>
              <form action="{{url('add_cart', $products->id)}}" method="Post">

               @csrf

               <div class="row">
                  
                  <div class="col-md-4">

                     <input type="number" name="quantity" value="1" min="0"
                     style="width: 100px">

                  </div>

                  <div class="col-md-4">

                     <input type="submit" value="Add to Cart">

                  </div>
                  

               </div>
               
            </form>

           </div>
        </div>
      </div>

      
      @include('home.footer')
    
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="Homepage/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="Homepage/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="Homepage/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="Homepage/js/custom.js"></script>
   </body>
</html>
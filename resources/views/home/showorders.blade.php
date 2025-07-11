<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
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

      <style type="text/css">

      .center
      {
         margin: auto;
         width: 70%;
         text-align: center;
         padding: 20px;
      
      }

      table,th,td
      {
         border: 1px solid grey;
      }

      .th_deg
      {
         font-size: 25px;
         padding: 5px;
         background: rgb(236, 147, 147);

      }

      .img_deg
      {
         height: 200px;
         width: 200px;
      }

      .total_deg
      {
         font-size: 20px;
         padding: 40px;
      }
      </style>
   </head>
   <body>
      <div class="hero_area">
        @include('home.header')

        @if (session()->has('message'))
        <div class="alert alert-success">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

         {{session()->get('message')}}
         

        </div>
           
        @endif

      <div class="center">

         <table>

            <tr>

               <th class="th_deg">Product Title</th>
               <th class="th_deg">Product Quantity</th>
               <th class="th_deg">Total Amount</th>
               <th class="th_deg">Image</th>
               <th class="th_deg">Action</th>

            </tr>

            <?php $totalprice=0;   ?>

            @foreach ($ordered_items as $ordered_items )

            <tr>

               <td>{{$ordered_items->item}}</td>
               <td>{{$ordered_items->quantity}}</td>
               <td>{{$ordered_items->amount}}</td>
               <td><img class="img_deg" src="/images/{{$ordered_items->image}}"></td>
               <td><a class="btn btn-danger" onclick="return confirm('Are you sure to remove this product?')"
                   href="{{url('/remove_orders', $ordered_items->id)}}">Remove Product</td>
            </tr>

            <?php $totalprice=$totalprice + $ordered_items->amount   ?>

            @endforeach

         </table>

         <div>

            <h1 class="total_deg" >Total Price: {{$totalprice}}</h1>
         </div>

         <div>

            <h1 style="font-size: 25px; padding-bottom:15px">Proceed to Order</h1>
   
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
   
            <a href="" class="btn btn-danger">Pay Using Card</a>
   
         </div>

      </div>

      
    
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
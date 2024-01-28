<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"></head>
</head>

<body class="theBody d-flex align-items-center justify-content-center " style="font-family: 'Poppins', sans-serif;;">
<div class="Box p-4">
<h1 class="py-3">Home Page</h1>
<div class="InBox p-3 mt-4">
<p>Which Table You Want To Check?</p>
<div class="d-flex" id ="r"> 
    <a class="Button" href="car.html">cars table</a>
    <a class="Button" href="address.html">addresses table</a>
    <a class="Button" href="car_part.html">car_part table</a>
    <a class="Button" href="customer.html">customers table</a>
    <a class="Button" href="device.html">devices table</a>
    <a class="Button" href="manufacture.html">Manufactures table</a>
    <a class="Button" href="order.html">orders table</a><br>

<a class="out" href="destroy.php">LogOut</a>

</div>
</div>
</div>
</body>
    <?php
session_start();
if(isset($_SESSION['username'])){
echo "";
}
else {
    header('Location: login_view.html');
}

?>
<style>
  .theBody{ background-color: #f5e7df;    
  }
  .Box{
    margin-top: 5%;

   background-color:  #566570!important;
   color: white;
  width: 150vmin;
  border-radius: 2vmin;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);

  }
  .InBox{
    background-color: #42525f;  
    border-radius: 2vmin;

  }
  .result{
    width: fit-content;
    height: fit-content;
    background-color: transparent !important;

  }
  input{
    all: unset;
    background-color: white;
    color: black;
    width: 100%;
    height: auto;
    border-radius: 1vmin;
    padding-left: 1vmin;
    margin-top: 4;
  }
  
select {

    background-color: rgb(228, 227, 222);
    color: black;
    border: 1px solid #ccc;
    padding: 8px;
    height: auto;
    border-radius: 5px;
    outline: none; 
    cursor: pointer; 
}


  .Button{
    all: unset;
    background-color: rgb(238, 236, 217)!important;
    color: #42525f;
    border-radius: 1vmin;
    padding: 1vmin;
    height: fit-content;
   text-align: center;
   width: 50%;
   margin-left: 25%;
   margin-top: 4;
  }
  .out{
    all: unset;
    background-color: rgb(218, 255, 250)!important;
    color: #42525f;
    border-radius: 1vmin;
    padding: 1vmin;
    height: fit-content;
   text-align: center;
   width: 25%;
   margin-left: 37.5%;
   margin-top: 4;
  }
  .out:hover{
    background-color:#0f0f0f!important;
    color: white;
  }
  .Button:hover{
    background-color:  #566570!important;
    color: white;
  }
  table, tr, td {
    border: 1px solid black;
    border-radius: 1vmin;
    padding: 1vmin;

}
th{
  background-color: #42525f;
  color: white;
  border: 1px solid black;
  padding: 1vmin;

}

.Result{
  background-color: white !important;
  border-radius: 1vmin;
}
.d-flex { 
    flex-direction: column;
        width: 100%;
        margin: 0 auto;
       }
@media (max-width: 600px) {
  .Box {
    width: 80vw;
    flex-direction: column;
margin-top: 25%;
  }
  .d-flex { 
    flex-direction: column;
        width: 100%;
        margin: 0 auto;
       }

       input{
        margin-top: 3%;
        text-align: center;
        width : 70%;
        margin-left: 15%;
        font-size: small;
       }
       .Button{
        margin-top: 3%;
width: 50%;
font-size: small;
margin-left: 25%;
text-align: center;
       }
     
      table{
       font-size: 7.5pt;
      }
      select {
        margin-top: 3%;
        text-align: center;
        width : 70%;
        margin-left: 16%;
        font-size: small;
}
}
@media (max-width: 420px) {
h1{
  font-size: 1em;
}
.py-3{
  text-align: center;
}
input{
  font-size: 8pt;
}
select{
  font-size: 8pt;
}
.Button{
  font-size: 8pt;
}
p{
  font-size: smaller;
}
table{
       font-size: 6pt;
      }
}
</style>
</html>
<html>
  <head>
    <title>Ajax Search</title>
   
    <script src="jquery-3.2.0.js">        </script>
          
 <link rel="stylesheet" type="text/css" href="CSS/style.css?version=1" />
    </head>
    <body>

<a  href="admin.php">home</a>
<div id="container" class="del">
     <input type="text" id="search"/>
     <input type="button" class="btn6" id="button" value="Search" />
     <ul id="result"></ul>
</div>  
 
</body>
    </html>

<script type="text/javascript">
            $(document).ready(function(){
                  
                 function search(){
 
                      var title=$("#search").val();
 
                      if(title!=""){

                         $.ajax({
                            type:"post",
                            url:"search.php",
                            data:"title="+title,
                            success:function(data){
                                $("#result").html(data);
                                $("#search").val("");
                             }
                          });
                      }
                       
                
                      
                 }
 
                  $("#button").click(function(){
                     search();
                  });
 
                  $('#search').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>
        
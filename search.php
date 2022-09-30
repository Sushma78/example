 <?php
    include_once("includes/header.php");

    ?>
 <div class="textboxContainer">
     <input type="text" class="searchInput" placeholder="Search For Something...">
 </div>

 <div class="results"></div>
 <script>
     $(function() {
         var username = '<?php echo $userLoggedIn; ?>';
         var timer;

         $(".searchInput").keyup(function() {
             clearTimeout(timer);

             timer = setTimeout(function() {
                 var val = $(".searchInput").val();

                 if (val == "") {
                     $(".results").html("");
                 } else {
                     $.post("ajax/getSearchResults.php", {
                         term: val,
                         username: username
                     }, function(data) {
                         $(".results").html(data);
                     });
                 }

             }, 500);
         })
     })
 </script>
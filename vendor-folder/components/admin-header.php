<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>netfood</title>
    
</head>
<header>
   
 <div class="container-fluid">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a id="len1" class="hoverable" href="#">Home</a></li>
        <li><a id="len2" class="hoverable" href="#">About</a></li>
        <li><a id="len3" class="hoverable" href="#">Portfolio</a></li>
        <li><a id="len4" class="hoverable" href="#">Contact</a></li>
      </ul>
    </div>
  </nav>
  <div id="what-the-hell-is-this">
    <div class="page-title">
      <h2>Simple Navigation</h2>
      <p class="lead">
       ../
      </p>
    </div>
  </div>
</div>   
</header>
<script>
    $(function(){
  var str = '#len'; //increment by 1 up to 1-nelemnts
  $(document).ready(function(){
    var i, stop;
    i = 1;
    stop = 4; //num elements
    setInterval(function(){
      if (i > stop){
        return;
      }
      $('#len'+(i++)).toggleClass('bounce');
    }, 500)
  });
});
</script>

<!DOCTYPE html>
<html>
<head>
<!-- Font Awesome Icon Library -->
<meta charset="utf-8">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.checked {
    color: orange;
    
}
</style>
</head>
<body>


<span  onmouseover="starmark(this)" onclick="starmark(this)" id="1one" style="font-size:40px;cursor:pointer;"  class="fa fa-star checked"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="2one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="3one"  style="font-size:40px;cursor:pointer;" class="fa fa-star "></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="4one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<span onmouseover="starmark(this)" onclick="starmark(this)" id="5one"  style="font-size:40px;cursor:pointer;" class="fa fa-star"></span>
<br/>
<textarea  style="margin-top:5px;" class="form-control" rows="3" id="comment" placeholder="Enter your review"></textarea>

<button  onclick="result()" type="button" style="margin-top:10px;margin-left:5px;" class="btn btn-lg btn-success">Submit</button>
</body>
<script>
var count;

function starmark(item)
{
count=item.id[0];
sessionStorage.starRating = count;
var subid= item.id.substring(1);
for(var i=0;i<5;i++)
{
if(i<count)
{
document.getElementById((i+1)+subid).style.color="orange";
}
else
{
document.getElementById((i+1)+subid).style.color="black";
}


}

}

function result()
{
//Rating : Count
//Review : Comment(id)
alert("Rating : "+count+"\nReview : "+document.getElementById("comment").value);
}

</script>
</html>
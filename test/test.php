<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>JavaScript form validation - checking email</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</head>
<body >
<div class="mail">
<h2>Input an email and Submit</h2>
<form name="form1" action="#"> 
<ul>
<li><input type='text' name='text1' class="mytest" onblur="getValue();" />
<div id='result1' style='display: none'>
								<div id='value1' style="padding:5px;color:red;"> </div></label>
							</div></li>
<li>&nbsp;</li>
<li class="submit"><input type="submit" name="submit" value="Submit" onclick="cust()" /></li>
<li>&nbsp;</li>
</ul>
</form>
</div>
<script >

function onEvent(event) {
    if (event.key === "Enter") {
         alert('enter press');
    }
};


	var emailval = document.querySelector('.mytest');
	//emailval.addEventListener('onblur', getValue);
	var aaa="https://perfosys.in/forTrial.php";
	function getValue(){
		console.log("insused","inside");
		var val=emailval.value;
		ValidateEmail(val);
	}
    function cust(){
		swal({
			title: "Good job!",
  text: 'Search for a movie. e.g. "La La Land".',
  content: "input",
  button: {
    text: "Search!",
    closeModal: false,
  },
})
.then(name => {
  if (!name) throw null;
 
  return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
})
.then(results => {
  return results.json();
})
.then(json => {
  const movie = json.results[0];
 
  if (!movie) {
    return swal("No movie was found!");
  }
 
  const name = movie.trackName;
  const imageURL = movie.artworkUrl100;
 
  swal({
    title: "Top result:",
    text: name,
    icon: imageURL,
  });
})
.catch(err => {
  if (err) {
    swal("Oh noes!", "The AJAX request failed!", "error");
  } else {
    swal.stopLoading();
    swal.close();
  }
});
	}
	function ValidateEmail(inputText)
	{
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(inputText.match(mailformat))
		{
		jQuery("div#result1").hide();
		jQuery("div#value1").html("");
		return true;
		}
		else
		{
		jQuery("div#result1").show();
		jQuery("div#value1").html("Please fill out all required fields.");
		return false;
		}
	}
</script>
</body>
</html>
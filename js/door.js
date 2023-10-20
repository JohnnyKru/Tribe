window.onload=function(){

var $Page = document.getElementsByClassName("page720")[0];
	var $Door = document.getElementsByClassName("door")[0];
	var $leftDoor = document.getElementsByClassName("left-door")[0];
	var $rightDoor = document.getElementsByClassName("right-door")[0];
	var $page1 = document.getElementById("page1");


	var $book = document.getElementById("book");
	var $btn = document.getElementById("btn-open");

	$btn.addEventListener("click",function(event){
		event.preventDefault();
		this.style.display = "none";
		$leftDoor.classList.add("left-door-open");
		$rightDoor.classList.add("right-door-open");

		setTimeout(function(){
      $($Door).remove();
			  $page1.classList.add("toface");
			  setTimeout(function(){
				    $page1.addEventListener("click",function(){
					    $($page1).move();

				    });
			  },1500);
			  window.location.replace("http://localhost/Kru/index.html");
		},3000);	
	});
};

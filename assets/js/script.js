$(document).ready(function() {   $("#slider").owlCarousel({    margin: 30,    items :3,    nav: true  }); });$('button#login').click( function() {	let username= $('input#username').val();	let password= $('input#password').val();	$.ajax({		async:false,		url:'controllers/authenticate.php',		method: "POST",		data: {			username: username,			password: password		},		success:function(e){			console.log(e);			if(e==0){				window.location.href = "/index.php";			} else {				window.location.href = "/admin.php";			}		}	})})
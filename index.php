<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>MITS Mentoring Platform</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link rel="stylesheet" href="css/tailwind.min.css">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
		<style>		
			.slide-in-bottom{-webkit-animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both;animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) both}
			.slide-in-bottom-h1{-webkit-animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) .5s both;animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) .5s both}
			.slide-in-bottom-subtitle{-webkit-animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) .75s both;animation:slide-in-bottom .5s cubic-bezier(.25,.46,.45,.94) .75s both}
			.fade-in{-webkit-animation:fade-in 1.2s cubic-bezier(.39,.575,.565,1.000) 1s both;animation:fade-in 1.2s cubic-bezier(.39,.575,.565,1.000) 1s both}
			.bounce-top-icons{-webkit-animation:bounce-top .9s 1s both;animation:bounce-top .9s 1s both}
			
			@-webkit-keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}@keyframes slide-in-bottom{0%{-webkit-transform:translateY(1000px);transform:translateY(1000px);opacity:0}100%{-webkit-transform:translateY(0);transform:translateY(0);opacity:1}}
			@-webkit-keyframes bounce-top{0%{-webkit-transform:translateY(-45px);transform:translateY(-45px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:1}24%{opacity:1}40%{-webkit-transform:translateY(-24px);transform:translateY(-24px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}65%{-webkit-transform:translateY(-12px);transform:translateY(-12px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}82%{-webkit-transform:translateY(-6px);transform:translateY(-6px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}93%{-webkit-transform:translateY(-4px);transform:translateY(-4px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}25%,55%,75%,87%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}100%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}}@keyframes bounce-top{0%{-webkit-transform:translateY(-45px);transform:translateY(-45px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in;opacity:1}24%{opacity:1}40%{-webkit-transform:translateY(-24px);transform:translateY(-24px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}65%{-webkit-transform:translateY(-12px);transform:translateY(-12px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}82%{-webkit-transform:translateY(-6px);transform:translateY(-6px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}93%{-webkit-transform:translateY(-4px);transform:translateY(-4px);-webkit-animation-timing-function:ease-in;animation-timing-function:ease-in}25%,55%,75%,87%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out}100%{-webkit-transform:translateY(0);transform:translateY(0);-webkit-animation-timing-function:ease-out;animation-timing-function:ease-out;opacity:1}}
			@-webkit-keyframes fade-in{0%{opacity:0}100%{opacity:1}}@keyframes fade-in{0%{opacity:0}100%{opacity:1}}				
		</style>
	</head>


	<body class=" bg-blue-400 " style="font-family: 'Source Sans Pro', sans-serif;">



		<div class="h-screen pb-14 bg-right bg-cover" ">
			
			<div class="container pt-24 md:pt-48 px-6 mx-auto flex flex-wrap flex-col md:flex-row items-center">
				
				<!--Left Col-->
				<div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
					<h1 class="my-4 text-3xl md:text-5xl text-purple-800 font-bold leading-tight text-center md:text-left slide-in-bottom-h1">Institute Vision</h1>
					<p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left slide-in-bottom-subtitle">To be a centre of excellence for learning and research in engineering and technology, producing intellectually well-equipped and socially committed citizens possessing an ethical value system.</p> 
					<div class="flex text-xl w-full justify-center md:justify-start pb-24 lg:pb-0 fade-in">
					<a href="slogin.php"><button class="bg-none hover:bg-blue-200 text-blue-600 font-bold py-2 px-4 rounded-full">
						Student
						</button></a>
						<a href="flogin.php"><button class="bg-none hover:bg-blue-200 text-white font-bold py-2 px-4 rounded-full">
						Faculty
						</button></a>
						<a href="clogin.php"><button class="bg-none hover:bg-blue-200 text-blue-600 font-bold py-2 px-4 rounded-full">
						Counselor
						</button></a>
					</div> 

				</div>
				
				<!--Right Col-->
				<div class="w-full xl:w-3/5 py-6 overflow-y-hidden">
					<img class="w-5/6 mx-auto lg:mr-0 slide-in-bottom" src="imgs/mitsImage.png">
				</div>
				
				<!--Footer-->
				<div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in ">
					<a class="text-black no-underline hover:no-underline" href="http://mgmits.ac.in/">&copy; Muthoot Institute of Technology and Science</a></br>
					<a href="login.php" class="inline-block text-sm px-4 py-2 leading-none text-purple-900 border-blue-600 hover:border-transparent hover:text-purple-300 hover:underline mt-4 lg:mt-0">Login As Admin?</a>
				</div>
			</div>
		</div>
	</body>
</html>
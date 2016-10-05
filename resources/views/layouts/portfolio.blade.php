<html>
<head>
        <link href="{{asset('style.css')}}" type="text/css" media="screen"  rel="stylesheet" />
	<link href="{{asset('style.ie6.css')}}" type="text/css" media="screen"  rel="stylesheet" />
        <link href="{{asset('style.ie7.css')}}" type="text/css" media="screen"  rel="stylesheet" />
    
  <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="{{asset('jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('script.js')}}"></script>
<title>Sanjeev Aryal</title>
<style>

p
{
	font-size:13px;
}
footer
{
	text-align:center;
	background-color:silver;
}
.name
{
	margin:200px;
	color:white;
	
	border:px solid silver;
	background-color:;
	border-radius:1px;
	font-size:28;
	text-decoration:bold;
	}
.slogan
{
	color:silver;
	margin:210px;
}
</style>
</head>

<body>
<div id="art-page-background-glare">
    <div id="art-page-background-glare-image"> </div>
</div>
<div id="art-main">
<div class="art-nav">
	<div class="art-nav-l"></div>
	<div class="art-nav-r"></div>
<div class="art-nav-outer">
<div class="art-nav-wrapper">
<div class="art-nav-inner">
	<ul class="art-hmenu">
		<li>
			<a href="{{url('/index')}}" class="active"><span class="l"></span><span class="r"></span><span class="t">About me</span></a>
		</li>
<li>
			<a href="{{url('/portfolio')}}"><span class="l"></span><span class="r"></span><span class="t">Portfolios</span></a>
		</li>	
			<li>
			<a href="{{url('/articles')}}"><span class="l"></span><span class="r"></span><span class="t">Articles</span></a>
		</li>

		<li>
			<a href="{{url('/biodata')}}"><span class="l"></span><span class="r"></span><span class="t">Bio-data</span></a>
		</li>	
	
		<li>
			<a href="{{url('/contact')}}"><span class="l"></span><span class="r"></span><span class="t">Contact</span></a>
		</li>	
		
	</ul>
</div>
</div>
</div>
</div>
<br>
       @yield('main')

<footer>

Copyright@2015. All rights reserved.
Designed and developed by <a href="index.html">Sanjeev Aryal</a>
</footer>
</body>
</html>

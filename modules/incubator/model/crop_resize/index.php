
	<link rel="stylesheet" type="text/css" href="modules/incubator/model/crop_resize/fc-cropresizer.css" />
	<script type="text/javascript" src="modules/incubator/model/crop_resize/fc-cropresizer.js"></script>
	<script type="text/javascript">
	//<![CDATA[
	cropresizer.getObject("photo1").init({
		cropWidth : 150,
		cropHeight : 150,
		onUpdate : function() {}
	});
	cropresizer.getObject("photo2").init({
		saveProportions : false,
		cropWidth : 75,
		cropHeight : 75,
		onUpdate : function() {}
	});
	cropresizer.getObject("photo3").init({
		cropBackground : 'yellow',
		showCropSize : false,
		cropWidth : 75,
		cropHeight : 75,
		onUpdate : function() {
			var div = document.getElementById("demId");
			if (div) {
				var info = "Длина изображения:" + this.iWidth;
				info += "<br\/>Высота изображения:" + this.iHeight;
				info += "<br\/>Длина кропа:" + this.cropWidth;
				info += "<br\/>Высота кропа:" + this.cropHeight;
				info += "<br\/>Y кропа:" + (this.cropTop - this.iTop);
				info += "<br\/>X кропа:" + (this.cropLeft - this.iLeft);
				div.innerHTML = info;
			}
		}
	});
	//]]>
	</script>
</head>
<body onSelectStart="return false;">
<div>
	<h1>Girl</h1>
	<div>saveProportions: true, cropWidth: 150, cropHeight: 150</div>
	<img id="photo1" src="modules/incubator/model/crop_resize/demo-photo/girl.jpg" width="346" height="500" alt="" />
	<div style="position:absolute; z-index:1000;">Модель &mdash; <a href="http://avis-solo.blogspot.com/">Светлана Соловьева</a>.</div>

	<h1>Square</h1>
	<div>saveProportions: false, cropWidth: 75, cropHeight: 75</div>
	<img id="photo2" src="modules/incubator/model/crop_resize/demo-photo/crop1.gif" width="346" height="346" alt="" />
	<div style="position:absolute; z-index:1000;">Для примера <a href="http://img.artlebedev.ru/everything/zhytlobud/identity/zhytlobud-bb-12-13.jpg">взята работа</a> Студии Лебедева</div>
	<br/><br/>

	<h1>Rectangle</h1>
	<div>cropWidth: 50, cropHeight: 50, cropBackground : 'yellow', showCropSize : false</div>
	<img id="photo3" src="modules/incubator/model/crop_resize/demo-photo/3.gif" width="346" height="150" alt="" />
	<div id="demId"></div>
</div>
</body>
</html>
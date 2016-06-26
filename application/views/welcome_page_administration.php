 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>দিকদর্শন প্রকাশনী Book Management </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?php echo base_url(); ?>style_sheet/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo base_url(); ?>style_sheet/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
         <link href="<?php echo base_url(); ?>style_sheet/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php echo base_url(); ?>style_sheet/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?php echo base_url(); ?>style_sheet/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?php echo base_url(); ?>style_sheet/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?php echo base_url(); ?>style_sheet/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>style_sheet/css/jQueryUI/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>style_sheet/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>style_sheet/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>style_sheet/css/responsive-table.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>style_sheet/js/jquery-1.10.2.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>style_sheet/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

  <style type="text/css" media="screen">
    body {
      background-color: #f9f9f9;
      /*color: white;*/
      font-family: 'Lucida Grande', Verdana, Arial;
      font-size: 12px;
      background-image: -webkit-gradient(radial,
                            50% 500, 1,
                            50% 500, 400,
                            from(rgba(255, 255, 255, 0.3)),
                            to(rgba(255, 255, 255, 0)));
     background-repeat: no-repeat;
    }

    #container {
      width: 100%;
      height: 235px;
      -webkit-perspective: 800; /* For compatibility with iPhone 3.0, we leave off the units here */
      -webkit-perspective-origin: 50% 225px;
    }

    .jumbotron{
      padding: 0;
      margin-bottom: 10px;
    }

    #stage {
      width: 100%;
      height: 100%;
      -webkit-transition: -webkit-transform 2s;
      -webkit-transform-style: preserve-3d;
    }
    
    #shape {
      position: relative;
      top: 50px;
      margin: 0 auto;
      height: 200px;
      width: 200px;
      -webkit-transform-style: preserve-3d;
    }
    
    .plane {
      position: absolute;
      height: 200px;
      width: 200px;
      border: 1px solid white;
      -webkit-border-radius: 12px;
      -webkit-box-sizing: border-box;
      text-align: center;
      font-family: Times, serif;
      font-size: 90pt;
      color: black;
      background-color: rgba(238, 238, 238, 0.8);
      -webkit-transition: -webkit-transform 2s, opacity 2s;
      -webkit-backface-visibility: hidden;
    }

    #shape.backfaces .plane {
      -webkit-backface-visibility: visible;
    }
    
    #shape {
      -webkit-animation: spin 8s infinite linear;
    }

    @-webkit-keyframes spin {
      from { -webkit-transform: rotateY(0); }
      to   { -webkit-transform: rotateY(-360deg); }
    }

    /* ---------- cube styles ------------- */
    .cube > .one {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) rotateX(90deg) translateZ(100px);
    }

    .cube > .two {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) translateZ(100px);
    }

    .cube > .three {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) rotateY(90deg) translateZ(100px);
    }

    .cube > .four {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) rotateY(180deg) translateZ(100px);
    }

    .cube > .five {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) rotateY(-90deg) translateZ(100px);
    }

    .cube > .six {
      opacity: 0.8;
      -webkit-transform: scale3d(1.2, 1.2, 1.2) rotateX(-90deg) translateZ(100px) rotate(180deg);
    }


    .cube > .seven {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) rotateX(90deg) translateZ(100px) rotate(180deg);
    }

    .cube > .eight {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) translateZ(100px);
    }

    .cube > .nine {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) rotateY(90deg) translateZ(100px);
    }

    .cube > .ten {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) rotateY(180deg) translateZ(100px);
    }

    .cube > .eleven {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) rotateY(-90deg) translateZ(100px);
    }

    .cube > .twelve {
      -webkit-transform: scale3d(0.8, 0.8, 0.8) rotateX(-90deg) translateZ(100px);
    }

    /* ---------- ring styles ------------- */
    .ring > .one {
      -webkit-transform: translateZ(380px);
    }

    .ring > .two {
      -webkit-transform: rotateY(30deg) translateZ(380px);
    }

    .ring > .three {
      -webkit-transform: rotateY(60deg) translateZ(380px);
    }

    .ring > .four {
      -webkit-transform: rotateY(90deg) translateZ(380px);
    }

    .ring > .five {
      -webkit-transform: rotateY(120deg) translateZ(380px);
    }

    .ring > .six {
      -webkit-transform: rotateY(150deg) translateZ(380px);
    }

    .ring > .seven {
      -webkit-transform: rotateY(180deg) translateZ(380px);
    }

    .ring > .eight {
      -webkit-transform: rotateY(210deg) translateZ(380px);
    }

    .ring > .nine {
      -webkit-transform: rotateY(-120deg) translateZ(380px);
    }

    .ring > .ten {
      -webkit-transform: rotateY(-90deg) translateZ(380px);
    }

    .ring > .eleven {
      -webkit-transform: rotateY(300deg) translateZ(380px);
    }

    .ring > .twelve {
      -webkit-transform: rotateY(330deg) translateZ(380px);
    }

    .controls {
      width: 80%;
      margin: 0 auto;
      padding: 5px 20px;
      -webkit-border-radius: 12px;
      /*background-color: rgba(238, 238, 238, 0.8);*/
    }
    .controls > div {
      margin: 10px;
    }
  </style>
  <script type="text/javascript" charset="utf-8">
    function hasClassName(inElement, inClassName)
    {
        var regExp = new RegExp('(?:^|\\s+)' + inClassName + '(?:\\s+|$)');
        return regExp.test(inElement.className);
    }

    function addClassName(inElement, inClassName)
    {
        if (!hasClassName(inElement, inClassName))
            inElement.className = [inElement.className, inClassName].join(' ');
    }

    function removeClassName(inElement, inClassName)
    {
        if (hasClassName(inElement, inClassName)) {
            var regExp = new RegExp('(?:^|\\s+)' + inClassName + '(?:\\s+|$)', 'g');
            var curClasses = inElement.className;
            inElement.className = curClasses.replace(regExp, ' ');
        }
    }

    function toggleClassName(inElement, inClassName)
    {
        if (hasClassName(inElement, inClassName))
            removeClassName(inElement, inClassName);
        else
            addClassName(inElement, inClassName);
    }

    function toggleShape()
    {
      var shape = document.getElementById('shape');
      if (hasClassName(shape, 'ring')) {
        removeClassName(shape, 'ring');
        addClassName(shape, 'cube');
      } else {
        removeClassName(shape, 'cube');
        addClassName(shape, 'ring');
      }
      
      // Move the ring back in Z so it's not so in-your-face.
      var stage = document.getElementById('stage');
      if (hasClassName(shape, 'ring'))
        stage.style.webkitTransform = 'translateZ(-200px)';
      else
        stage.style.webkitTransform = '';
    }
    
    function toggleBackfaces()
    {
      var backfacesVisible = document.getElementById('backfaces').checked;
      var shape = document.getElementById('shape');
      if (backfacesVisible)
        addClassName(shape, 'backfaces');
      else
        removeClassName(shape, 'backfaces');
    }
  </script>
</head>
<?php $this->load->view('common/header'); ?>

<div class="container">
	<div class="row">

  <div class="controls">
    
    <div><button class="btn btn-primary" onclick="toggleShape()">Toggle Shape</button></div>
    <!-- <div><input type="checkbox" id="backfaces" onclick="toggleBackfaces()" checked><label for="backfaces">Backfaces visible</label></div> -->
  </div>

  <div id="container">
    <div id="stage" style="transform: translateZ(-200px);">
      <div id="shape" class="ring backfaces">
        <div class="plane one">
        	<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/dik dorshon.png" alt=""></a>
        </div>
        <div class="plane two">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/grontho kutir.png" alt=""></a>
          </div>
        </div>
        <div class="plane three">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/knoledge share.png" alt=""></a>
          </div>
        </div>
        <div class="plane four">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/m.c paul.png" alt=""></a>
          </div>
        </div>
        <div class="plane five">
          <div class="image_grid">
           <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/golden future.png" alt=""></a>
          </div>
        </div>

        <div class="plane six">
          <div class="image_grid">
           <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/srijon prokash.png" alt=""></a>
          </div>
        </div>

        <div class="plane seven">
          <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/dik dorshon.png" alt=""></a>
        </div>
        <div class="plane eight">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/grontho kutir.png" alt=""></a>
          </div>
        </div>
        <div class="plane nine">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/knoledge share.png" alt=""></a>
          </div>
        </div>
        <div class="plane ten">
          <div class="image_grid">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/m.c paul.png" alt=""></a>
          </div>
        </div>
        <div class="plane eleven">
          <div class="image_grid">
           <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/golden future.png" alt=""></a>
          </div>
        </div>

        <div class="plane twelve">
          <div class="image_grid">
           <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>dik_dorshon/srijon prokash.png" alt=""></a>
          </div>
        </div>
 
      </div>
    </div>
  </div>


<div class="col-md-12">
	<div class="jumbotron text-center">
		<h1>প্রকাশনা গ্রুপ </h1>
		<p><strong>শোরুম ও বিক্রয় কেন্দ্র : </strong> ২৬, আলী রেজা মার্কেট, বাংলাবাজার, ঢাকা-১১০০। </p>

		<p><strong>কর্পোরেট অফিস  : </strong> ৩/১,৩/২,৩/৩, চিত্তরঞ্জন এভিনিউ, সদরঘাট, ঢাকা-১১০০। </p>
		<p>
			<strong>Web : </strong> www.dik-grantha.com 
			<strong style="margin-left: 20px;">Email : </strong> dikdorshan@yahoo.com 
		</p>
	</div>
</div>



		<div class="col-md-12">


			<div class="hidden-xs hidden-sm text-center">
				<div class="button-group">

					<a href="<?php echo base_url(); ?>" class="btn btn-lg btn-primary"> Home </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-lg btn-primary"> Administration </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-lg btn-primary"> Manager </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-lg btn-primary"> Marketing Promotion Officer </a>

					
				</div>
			</div>

			<div class="hidden-lg hidden-xs text-center">
				<div class="button-group">

					<a href="<?php echo base_url(); ?>" class="btn btn-sm btn-primary"> Home  </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-sm btn-primary"> Administration </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-sm btn-primary"> Manager </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-sm btn-primary"> Marketing Promotion Officer </a>

					
				</div>
			</div>

			<div class="hidden-lg hidden-sm">
				<div class="button-group">

					<a href="<?php echo base_url(); ?>" class="btn btn-xs btn-primary"> Home  </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-xs btn-primary"> Admin </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-xs btn-primary"> Manager </a>

					<a href="<?php echo base_url(); ?>home/dashboard" class="btn btn-xs btn-primary"> MPO </a>

					
				</div>
			</div>
		</div>


</div>
</div>
<?php
//echo CI_VERSION;
$this->load->view('common/footer');

?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
  <title>jR3DCarousel - a jQuery 3D Responsive Carousel</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/2.0.1/normalize.css">
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
	<div class="container">
		<h1>jR3DCarousel - jQuery 3D Responsive Carousel</h1>
		
		<h2>jR3DCarousel - with custom slides template & perspective</h2>
		
      <?php
        $images = glob("images/*");
        
        for($i = 0; $i < 4; $i++){
          echo '<div class="jR3DCarouselGallery'.$i.'">';
          foreach($images as $img){
            echo '<div class="jR3DCarouselCustomSlide">
            				<a href="#"><img src="'.$img.'" /></a>
            				<div class="captions">This is custom text slide 1</div>
            			</div>';
          }
          echo '</div>';
        }
      ?>
		</div>
		<br /> <br />
		<br /> <br />
	
  <script src="http://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.6/prefixfree.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="js/jR3DCarousel.min.js"></script>
  <script type="text/javascript">
    "use strict";
    
    $(document).ready(function(){
      
      var width = $(".jR3DCarouselGallery0").width(),
        effects = ['slide3D', 'slide', 'scroll', 'scroll3D'],
        perspective, effect, i;
      
    	var carouselCustomeTemplateProps =  {
    	 		  width: width, 				/* largest allowed width */
    			  height: width*0.6, 				/* largest allowed height */
    			  slideLayout : 'cover',     /* "contain" (fit according to aspect ratio), "fill" (stretches object to fill) and "cover" (overflows box but maintains ratio) */
    			  animation: null, //effect,
    			  animationCurve: 'ease',
    			  animationDuration: 1900,
    			  animationInterval: 3000,
    			  slideClass: 'jR3DCarouselCustomSlide',
    			  autoplay: true,
    			  controls: true,			/* control buttons */
    			  navigation: ''			/* circles | squares | '' */,
    			  perspective: null,
    			  rotationDirection: 'ltr',
    			  onSlideShow: slideShownCallback
    		}
    	function slideShownCallback($slide){
    		//console.log("Slide shown: ", $slide.find('img').attr('src'))
    	}
      for(i = 0; i < effects.length; i++){
        carouselCustomeTemplateProps.animation = effect = effects[i];
        if(effect == 'slide3D'){
          carouselCustomeTemplateProps.perspective = width*3;
        }else if(effect == 'scroll3D'){
          carouselCustomeTemplateProps.perspective = width*2;
        }else{
          carouselCustomeTemplateProps.perspective = 0;
        }
        $('.jR3DCarouselGallery'+i).jR3DCarousel(carouselCustomeTemplateProps); 
      }

    });
  
  function getRandElFromArray(arr){
    var max = arr.length - 1,
        rand = Math.floor(Math.random() * (max + 1));
    return arr[rand];
  }
</script>
</body>
</html>
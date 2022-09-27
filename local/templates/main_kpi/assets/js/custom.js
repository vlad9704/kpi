
$(document).ready(function(){
	
	$('input[name*="PHONE"]').inputmask({ mask: "+7 999 999 99 99", greedy: false });
	
	//fix pagination
	var numPaginationItem = $('.pagination-box__item a').length;
	var activeIndex = $('.pagination-box__item a.active').parent().index();
	
	 if (window.matchMedia('(min-width: 768px)').matches) 
	 {
		$('.pagination-box__item a').each(function(i,k) {
			if(i!=0 && k.textContent != "..." && i!=activeIndex && i!=(activeIndex-1) && i!=(activeIndex+1) && i!=(numPaginationItem-1))
			{
				k.parentElement.remove();
			}
		});
	 }
	
	 if (window.matchMedia('(max-width: 767px)').matches) 
	 {
		$('.pagination-box__item a').each(function(i,k) {
			if(i!=0  && i!=activeIndex && i!=(activeIndex-1) && i!=(activeIndex+1) && i!=(numPaginationItem-1))
			{
				k.parentElement.remove();
			}
		});
	 }
	
    
	var particles = $('.header-canvas');
	if (particles.length > 0) {
		setTimeout(function(){
				particlesJS("particles-js", {
				  "particles": {
					"number": {
					  "value": 320,
					  "density": {
						"enable": true,
						"value_area": 800
					  }
					},
					"color": {
					  "value": "#ffffff"
					},
					"shape": {
					  "type": "circle",
					  "stroke": {
						"width": 0,
						"color": "#000000"
					  },
					  "polygon": {
						"nb_sides": 5
					  },
					  "image": {
						"src": "img/github.svg",
						"width": 100,
						"height": 100
					  }
					},
					"opacity": {
					  "value": 0.5,
					  "random": false,
					  "anim": {
						"enable": false,
						"speed": 1,
						"opacity_min": 0.1,
						"sync": false
					  }
					},
					"size": {
					  "value": 3,
					  "random": true,
					  "anim": {
						"enable": false,
						"speed": 40,
						"size_min": 0.1,
						"sync": false
					  }
					},
					"line_linked": {
					  "enable": true,
					  "distance": 80,
					  "color": "#ffffff",
					  "opacity": 0.4,
					  "width": 1
					},
					"move": {
					  "enable": true,
					  "speed": 6,
					  "direction": "none",
					  "random": false,
					  "straight": false,
					  "out_mode": "out",
					  "bounce": false,
					  "attract": {
						"enable": false,
						"rotateX": 600,
						"rotateY": 1200
					  }
					}
				  },
				  "interactivity": {
					"detect_on": "canvas",
					"events": {
					  "onhover": {
						"enable": true,
						"mode": "grab"
					  },
					  "onclick": {
						"enable": true,
						"mode": "push"
					  },
					  "resize": true
					},
					"modes": {
					  "grab": {
						"distance": 80,
						"line_linked": {
						  "opacity": 1
						}
					  },
					  "bubble": {
						"distance": 80,
						"size": 40,
						"duration": 2,
						"opacity": 8,
						"speed": 3
					  },
					  "repulse": {
						"distance": 80,
						"duration": 0.4
					  },
					  "push": {
						"particles_nb": 4
					  },
					  "remove": {
						"particles_nb": 2
					  }
					}
				  },
				  "retina_detect": true
				});


		}, 1000);
    }


});



function openModal(modalID){
	//var popup = new Foundation.Reveal($('#'+modalID));
	$('#'+modalID).foundation('open');
}

function resizeForSmallFunction(x) {
	if(!x.matches)
	{
		$('.header-bg__item video').each(function(){
			if($(this).attr('poster-big').length>0){
				$(this).attr('poster',$(this).attr('poster-big'));
			}
		});
		//console.log('big');
	}
	else
	{
		$('.header-bg__item video').each(function(){
			if($(this).attr('poster-small').length>0){
				$(this).attr('poster',$(this).attr('poster-small'));
			}
		});
		//console.log('small');
	}
}

var x = window.matchMedia("(max-width: 640px)");
resizeForSmallFunction(x); 
x.addListener(resizeForSmallFunction) ;


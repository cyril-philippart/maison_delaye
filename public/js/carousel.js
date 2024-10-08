var items = [];
var startItem = 1;
var position = 0;
var itemCount = $('.carousel li.items').length;
var leftpos = itemCount;
var resetCount = itemCount;

//unused: gather text inside items class
$('li.items').each(function(index) {
    items[index] = $(this).text();
});

//swap images function
function swap(action) {
  var direction = action;
  
  //moving carousel backwards
  if(direction == 'counter-clockwise') {
    var leftitem = $('.left-pos').attr('id') - 1;
    if(leftitem == 0) {
      leftitem = itemCount;
    }
    
    $('.right-pos').removeClass('right-pos').addClass('back-pos');
    $('.main-pos').removeClass('main-pos').addClass('right-pos');
    $('.left-pos').removeClass('left-pos').addClass('main-pos');
    $('#'+leftitem+'').removeClass('back-pos').addClass('left-pos');
    
    startItem--;
    if(startItem < 1) {
      startItem = itemCount;
    }
  }
  
  //moving carousel forward
  if(direction == 'clockwise' || direction == '' || direction == null ) {
    function pos(positionvalue) {
      if(positionvalue != 'leftposition') {
        //increment image list id
        position++;
        
        //if final result is greater than image count, reset position.
        if((startItem+position) > resetCount) {
          position = 1-startItem;
        }
      }
    
      //setting the left positioned item
      if(positionvalue == 'leftposition') {
        //left positioned image should always be one left than main positioned image.
        position = startItem - 1;
      
        //reset last image in list to left position if first image is in main position
        if(position < 1) {
          position = itemCount;
        }
      }
   
      return position;
    }  
  
   $('#'+ startItem +'').removeClass('main-pos').addClass('left-pos');
   $('#'+ (startItem+pos()) +'').removeClass('right-pos').addClass('main-pos');
   $('#'+ (startItem+pos()) +'').removeClass('back-pos').addClass('right-pos');
   $('#'+ pos('leftposition') +'').removeClass('left-pos').addClass('back-pos');

    startItem++;
    position=0;
    if(startItem > itemCount) {
      startItem = 1;
    }
  }
}

//next button click function
$('#next').click(function() {
  swap('clockwise');
});

//prev button click function
$('#prev').click(function() {
  swap('counter-clockwise');
});

//if any visible items are clicked
$('li').click(function() {
  if($(this).attr('class') == 'items left-pos') {
     swap('counter-clockwise'); 
  }
  else {
    swap('clockwise'); 
  }
});

function changeIndexToggle(checkboxElem) 
{
	if (checkboxElem.checked) 
	{
    $('.slider' ).toggleClass('special');
		changeIndex = document.querySelector('#hamburger_overlay #hamburger_menu_activated')
		changeIndex.style.zIndex = "1"
    changeIndex.style.position = "fixed"

    changeIndex = document.querySelector('.carousel')
    changeIndex.style.zIndex = "-1"

    changePosition = document.querySelector('.hamburger')
    changePosition.style.position = "fixed"

    changePosition = document.querySelector('.toggler')
    changePosition.style.position = "fixed"

    changeColor = document.querySelector('.hamburger >div')
		changeColor.style.backgroundColor = 'white';
	}
  else 
	{
    $('.slider' ).removeClass('special');
		changeIndex = document.querySelector('#hamburger_overlay #hamburger_menu_activated')
		changeIndex.style.transition = 'all 1.6s ease';
    changeIndex.style.zIndex = '-1';

    changePosition = document.querySelector('.hamburger')
    changePosition.style.position = "absolute"
    
    changePosition = document.querySelector('.toggler')
    changePosition.style.position = "absolute"

    changeColor = document.querySelector('.hamburger >div')
		changeColor.style.backgroundColor = '#022168';
	}
}

function ChangeTextBaliseMore(chekboxElement) {
    if(chekboxElement.checked) {
        let change_text = document.querySelector('.read-more-button');
        change_text.innerHTML = 'Voir moins';
        
    };
    if(! chekboxElement.checked) {
        let change_text = document.querySelector('.read-more-button');
        change_text.innerHTML = 'Voir plus';
    };
}
            
$(window).scroll(function(){
  var scrollPos = $(this).scrollTop() / 22;

  $('#logo_grey').css({
    'left' : 80 - scrollPos + '%'
  })
})

$(window).scroll(function(){
  var scrollPos = $(this).scrollTop() / 14.5;

  $('#logo_grey_2').css({
    'left' : 205 - scrollPos + '%'
  })
})
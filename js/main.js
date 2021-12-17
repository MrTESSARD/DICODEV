var table ='table';
var tableFonctions ='fonctions';
var tuple ='tuple';
var route ='route';

// DARKMODE
let checkbox = document.querySelector('input[name=theme]');

checkbox.addEventListener('change', function() {
    if(this.checked) {
        trans()
        document.documentElement.setAttribute('data-theme', 'dark')
    } else {
        trans()
        document.documentElement.setAttribute('data-theme', 'light')
    }
})

let trans = () => {
    document.documentElement.classList.add('transition');
    window.setTimeout(() => {
        document.documentElement.classList.remove('transition')
    }, 200)
}
// SIDEBAR
const sidebarClose = document.querySelector('.sidebar-close')
sidebarClose.addEventListener('click', () => {
  console.log("click", sidebarClose)
  const divSidebar = document.querySelector(".general-sidebar")
  const divPage = document.querySelector('.main-content')
  const footerPage = document.querySelector('.footer-content')
  divSidebar.classList.toggle("sidebar-action")
  divPage.classList.toggle("main-content-action")
  footerPage.classList.toggle("footer-content-action")
})
// DROPDOWN MENU
let dropdown = document.querySelectorAll('.dropdown');
let dropdownArray = Array.prototype.slice.call(dropdown,0);
dropdownArray.forEach(function(el){
	let button = el.querySelector('[data-toggle="dropdown"]'),
    menu = el.querySelector('.dropdown-menu'),
    arrow = button.querySelector('i.fas');
    button.onclick = function(event) {
        event.preventDefault();
        menu.classList.toggle('dropdown-menu-hidden');
        arrow.classList.toggle('arrow-open');
    };
});
// SCROLL
(function(){

    let doc = document.querySelector('body');
    let w = window;
  
    let prevScroll = w.scrollY || doc.scrollTop;
    let curScroll;
    let direction = 0;
    let prevDirection = 0;
  
    let header = document.querySelector('.header');
    let sidebar = document.querySelector('.sidebar');
    let mainContent = document.querySelector('.main-content')
  
    let checkScroll = function() {

      curScroll = w.scrollY || doc.scrollTop;
      if (curScroll > prevScroll) { 
        //scrolled up
        direction = 2;
      }
      else if (curScroll < prevScroll) { 
        //scrolled down
        direction = 1;
      }
  
      if (direction !== prevDirection) {
        toggleHeader(direction, curScroll);
      }
  
      prevScroll = curScroll;
    };
  
    let toggleHeader = function(direction, curScroll) {
      if (direction === 2 && curScroll > 58) { 

        header.classList.add('hide-header');
        mainContent.classList.add('main-content-scroll');
        sidebar.classList.add('sidebar-action-scroll');
        prevDirection = direction;
      }
      else if (direction === 1) {
        header.classList.remove('hide-header');
        mainContent.classList.remove('main-content-scroll');
        sidebar.classList.remove('sidebar-action-scroll');
        prevDirection = direction;
      }
    };
  
    window.addEventListener('scroll', checkScroll);
  
  })();

/* SEARCH BAR */
const endpoint = '../json/find.json';

const proprieties = [];

fetch(endpoint)

  .then(blob => blob.json())

  .then(data => proprieties.push(...data));

function findMatches(wordToMatch, proprieties) {

  return proprieties.filter(place => {

    // here we need to figure out if the propriete or langage matches what was searched

    const regex = new RegExp(wordToMatch, 'gi');

    return place.fonction.match(regex) || place.propriete.match(regex) || place.langage.match(regex)

    

  });

}

function numberWithCommas(x) {

  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');

}

var sideBarContent=document.getElementById("inputCherche");
function displayMatches() {

  const matchArray = findMatches(this.value, proprieties);

  const html = matchArray.map(place => {

    const regex = new RegExp(this.value, 'gi');

    const langageName = place.langage.replace(regex, `<span class="hl">${this.value}</span>`);
    
    const proprieteName = place.propriete.replace(regex, `<span class="hl">${this.value}</span>`);
    const fonctionName = place.fonction.replace(regex, `<span class="hl">${this.value}</span>`);

    return   `
    
    
    <li>
    
    <span class="name" style=>${langageName}, <span class="langage"  style=>${proprieteName}</span> </span>
    
    <a href="index.php?${route}=src&${table}=${tableFonctions}&${tuple}=${fonctionName}" <span class="fonction" style=>${fonctionName}</span> </a>

    
    
    
    
    </li>
    
    `;
    
    
  }).join('');
 
  //Affichage ou non la sidebar
  if (sideBarContent.value.length>0) {
    document.getElementById("sidebar").style.display = "none";
    console.log (sideBarContent.value.length); 
    
  
    if (sideBarContent.value.length>1) {
    // console.log (sideBarContent.value.length);
    document.getElementsByClassName("suggestions")[0].style.display = 'block';
    suggestions.innerHTML = html;
    }
    else{
      document.getElementsByClassName("suggestions")[0].style.display = 'none';
    }
  
  }
  else{
    document.getElementById("sidebar").style.display = "flex";
  
    
  }
}




const searchInput = document.querySelector('.search');


const suggestions = document.querySelector('.suggestions');



searchInput.addEventListener('change', displayMatches);

searchInput.addEventListener('keyup', displayMatches);
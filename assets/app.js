/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// // start the Stimulus application
// import './bootstrap';


// work with sidebar
var btn     = document.getElementById('sliderBtn'),
    sideBar = document.getElementById('sideBar'),
    sideBarHideBtn = document.getElementById('sideBarHideBtn');

// show sidebar
btn.addEventListener('click' , function(){
    if (sideBar.classList.contains('md:-ml-64')) {
        sideBar.classList.replace('md:-ml-64' , 'md:ml-0');
        sideBar.classList.remove('md:slideOutLeft');
        sideBar.classList.add('md:slideInLeft');
    };
});

// hide sideBar
sideBarHideBtn.addEventListener('click' , function(){
    if (sideBar.classList.contains('md:ml-0' , 'slideInLeft')) {
        var _class = function(){
            sideBar.classList.remove('md:slideInLeft');
            sideBar.classList.add('md:slideOutLeft');

        };
        var animate = async function(){
            await _class();

            setTimeout(function(){
                sideBar.classList.replace('md:ml-0' , 'md:-ml-64');
            } , 300);

        };

        _class();
        animate();
    };
});
// end with sidebar

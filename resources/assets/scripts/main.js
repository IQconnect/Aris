// import external dependencies
import 'jquery';
import WOW from 'wowjs';

// Import everything from autoload
import './autoload/**/*';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

//import header from './components/header';
import hamburger from './components/hamburger';
import header from './components/header';
import submenu from './components/submenu';
import slider from './components/slider';
import preloader from './components/preloader';
import calendar from './components/calendar';
import addToCart from './components/add-to-cart';


/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
jQuery(document).ready(() => {
  routes.loadEvents();
  header.init();
  submenu.init();
  preloader.init();
  hamburger.init();
  calendar.init();
  addToCart.init();
  //new WOW.WOW.init();
  if ($('.main-carousel').length) {
    slider.init();
  }

  setTimeout(() => {
    new WOW.WOW().init();

    setTimeout(function () {
      $('.quantity .screen-reader-text').text($('.quantity input').val());
      if ($('#order_comments')) {
        const dates = window.location.href.split('?')[1]

        $('#order_comments').val(`${dates}`);
      }
    }, 300);
  }, 300)
});


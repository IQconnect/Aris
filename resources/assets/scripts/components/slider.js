const Flickity = require('flickity');

// deklarowanie obiektu
const slider = {
  init() {
    this.slider = new Flickity('.main-carousel', {
      prevNextButtons: false,
      pageDots: false,
      wrapAround: true,
      autoPlay: 4500,
    });
    this.resize();
  },

  resize() {
    window.onload = () => {
      this.slider.resize();
    };
  },
}

export default slider;
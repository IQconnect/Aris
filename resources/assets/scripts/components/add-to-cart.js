import 'jquery';

const CONFIG = {
  ELEM: 'data-add-to-cart',
}

const addToCart = {
  init() {
    const { ELEM } = CONFIG;

    this.elem = document.querySelectorAll(`[${ELEM}]`);
    this.addEvents();
  },

  addEvents() {
    this.elem.forEach(element => {
      element.addEventListener('click', e => {
        e.preventDefault();

        console.log('test kliku linka add to cart');

        const link = e.currentTarget.href;
        const redirect = link.split('&add-to-cart')[0];

        console.log(e, link, redirect);

        $.ajax({
          url: link,
          context: document.body,
        }).done(function() {
          window.location = redirect;
        });
      })
    });
  },
}

export default addToCart;

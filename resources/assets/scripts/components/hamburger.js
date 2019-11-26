const CONFIG = {
  TRIGGER: '[data-toggle-menu]',
  ELEM: '[data-nav]',
  CLASS: '-is-active',
  BODY: '[data-body]',
  HIDDEN: 'hidden',
};

const toggleMenu = {
  init() {
    const { TRIGGER, ELEM, BODY } = CONFIG;
    this.$trigger = document.querySelector(TRIGGER);
    this.$elem = document.querySelector(ELEM);
    this.$body = document.querySelector(BODY);
    this.addEvent();
  },

  addEvent() {
    const { CLASS, HIDDEN } = CONFIG;
    this.$trigger.addEventListener('click', (event) => {
        const $this = event.currentTarget;
        $this.classList.toggle(CLASS);
        this.toggleElem(CLASS);
        this.toggleOverflow(HIDDEN);
    });
  },

  toggleElem(CLASS) {
    this.$elem.classList.toggle(CLASS);
  },

  toggleOverflow(HIDDEN) {
    this.$body.classList.toggle(HIDDEN);
    console.log('test');
  },
};

export default toggleMenu;
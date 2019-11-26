const CONFIG = {
  TRIGGER: '.menu-item-has-children a',
  ELEM: '.sub-menu',
  HREF: '.sub-menu li',
  CLASS: 'd-block',
  ACTIVE: 'current-menu-item',
};

const submenu = {
  init() {
    const { TRIGGER, ELEM, CLASS, HREF, ACTIVE } = CONFIG;
    this.$trigger = document.querySelector(TRIGGER);
    this.$elem = document.querySelector(ELEM);
    this.$href = document.querySelectorAll(HREF);
    this.$class = CLASS;
    this.$active = ACTIVE
    this.active(ACTIVE);
    if(this.$trigger) {
      this.addEvent();
    }
  },

  active(ACTIVE) {
    for(const item of this.$href) {
      item.classList.remove(ACTIVE);
    }
  },

  addEvent() {
    this.$trigger.addEventListener('click', (event) => {
      event.preventDefault();
      this.$elem.classList.toggle(this.$class);
    });
  },
};

export default submenu;
const CONFIG = {
  ELEMENTS: {
    BODY: 'data-calendar-body',
    MONTH: 'data-calendar-month',
    CELL: 'data-calendar-cell',
    CELL_LABEL: 'data-calendar-cell-label',
    CHANGE_MONTH: 'data-calendar-change-month',
    INPUT: 'data-calendar-input',
    FROM: 'data-calendar-from',
    TO: 'data-calendar-to',
  },
  MONTHS: ['Styczeń', 'Luty', 'Marzec', 'Kwiecień', 'Maj', 'Czerwiec', 'Lipiec', 'Sierpień', 'Wrzesień', 'Październik', 'Listopad', 'Grudzień'],
  DAYS: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
};

const calendar = {
  init() {
    const { ELEMENTS, MONTHS, DAYS } = CONFIG;

    // label elements
    this.monthLabel = document.querySelector(`[${ELEMENTS.MONTH}]`);
    this.fromLabel = document.querySelector(`[${ELEMENTS.FROM}]`);
    this.toLabel = document.querySelector(`[${ELEMENTS.TO}]`);
    this.body = document.querySelector(`[${ELEMENTS.BODY}]`);
    this.cell = document.querySelectorAll(`[${ELEMENTS.CELL}]`);
    this.monthChange = document.querySelectorAll(`[${ELEMENTS.CHANGE_MONTH}]`);
    this.input = document.querySelectorAll(`[${ELEMENTS.INPUT}]`);

    // store date objects
    this.currentDate = new Date();
    this.currentMonth;
    this.from;
    this.to;
    this.myData;
    this.toDayDate = `${this.currentDate.getFullYear()}-${('0' + (this.currentDate.getMonth() + 1)).slice(-2)}-${('0' + this.currentDate.getDate()).slice(-2)}`;

    console.log('dziś jest', this.toDayDate);

    // label data
    this.cellSelector = ELEMENTS.CELL_LABEL;
    this.months = MONTHS;
    this.days = DAYS;

    if (this.body) {
      // function execution
      this.createMonth();
      this.addEvents();

      // log data
      console.log(this.currentDate);
    }

  },

  addEvents() {
    for (const elem of this.monthChange) {
      elem.addEventListener('click', event => {
        // label data
        const direction = event.currentTarget.dataset.calendarChangeMonth;

        // Set new month
        if (direction === 'next') {
          this.currentDate.setMonth(this.currentDate.getMonth() + 1);
        }

        else {
          this.currentDate.setMonth(this.currentDate.getMonth() - 1);
        }

        this.createMonth();

        console.log('thisMonth', this.currentDate);
      })
    }

    for (const elem of this.cell) {
      elem.addEventListener('click', event => {
        // label data
        const date = event.currentTarget.dataset.date;

        this.slectFromToDate(date);

        console.log('thisMonth', this.currentDate);
      })
    }

    for (const elem of this.input) {
      elem.addEventListener('input', event => {
        const $this = event.currentTarget;


        if ($this.dataset.calendarInput == 'from') {
          this.from = $this.value;
        }

        else {
          this.to = $this.value;
        }

        if(this.formatDateToNumber(this.to) < this.formatDateToNumber(this.from)) {
          const holder = this.to;

          this.to = this.from;
          this.from = holder;

          this.fromLabel.value = this.from;
          this.toLabel.value = this.to;
        }

        console.log('change', this.from);

        this.fillDays();
      })
    }
  },

  createMonth(date = this.currentDate) {

    // label data
    const myData = {};

    // set value for labels
    myData.year = date.getFullYear();
    myData.month = date.getMonth();
    myData.day = date.getDate();
    myData.endpoints = this.monthEndpoints(myData);

    // set value for object value
    this.myData = myData;

    // function execution
    this.changeDate(this.myData.month, this.myData.year);
    this.fillDays();

    // output in console
    console.log(date.getFullYear())
  },

  changeDate(month, year) {
    // set current month as object param
    this.currentMonth = month;

    // change current month text
    this.monthLabel.innerText = `${this.months[month]} ${year}`;
  },

  monthEndpoints(date) {
    // label data
    const monthEndpoints = {};
    let firstDayName;

    // set value for labels
    firstDayName = this.days[new Date(date.year, date.month, 1).getDay()];
    monthEndpoints.first = this.days.indexOf(firstDayName);
    monthEndpoints.last = new Date(date.year, date.month + 1, 0).getDate();

    // return
    return monthEndpoints;
  },

  fillDays(myData = this.myData) {

    console.log(myData);

    // label data
    const { endpoints, month, year } = myData;
    const { first, last } = endpoints;

    let day = last;

    this.cell.forEach((elem, index) => {
      // label data
      const label = elem.querySelector(`[${this.cellSelector}]`);

      // reset
      elem.removeAttribute('data-date');
      elem.classList.remove('calendar__cell--selected');

      // modify value
      if (index == first) day = 0;

      if (index >= first && index < last + first) {
        day++;

        const date = `${year}-${('0' + (month + 1)).slice(-2)}-${('0' + day).slice(-2)}`;

        if (this.formatDateToNumber(date) > this.formatDateToNumber(this.toDayDate)) {
          elem.setAttribute('data-date', date);

          elem.classList.add('calendar__cell--month');
        }

        label.innerText = day < 10 ? `0${day}` : day;
      }

      else {
        label.innerText = '';
        elem.classList.remove('calendar__cell--month');
      }

      if (day == last) day = 0;

      const thisNumDate = elem.dataset.date && this.from && this.to ? this.formatDateToNumber(elem.dataset.date) : false;

      if (thisNumDate) {
        // color setected cells
        console.log('thisNumDate', thisNumDate)
        if (
          thisNumDate >= this.formatDateToNumber(this.from) &&
          thisNumDate <= this.formatDateToNumber(this.to)
        ) {
          elem.classList.add('calendar__cell--selected');
        }

        else {
          elem.classList.remove('calendar__cell--selected');
        }
      }

      else {
        elem.classList.remove('calendar__cell--selected');
      }

      // output in console
      //console.log('elem date: ', this.from, thisNumDate);
    })
  },

  slectFromToDate(date) {

    if (this.formatDateToNumber(date) <= this.formatDateToNumber(this.toDayDate)) {
      return alert('Masz wechikuł czasu? :) Nie możesz zarezerwować campingu na wczoraj')
    }

    // select from date
    if (this.to) {
      this.from = date;
      this.to = undefined;

      this.fillDays();

      const curSelected = document.querySelector(`[data-date="${date}"]`);
      curSelected.classList.add('calendar__cell--selected');
      console.log(1.1);
    }

    else {
      console.log(1.2);
      if (!this.from) {
        this.from = date;
        this.to = undefined;
        console.log(1.21);
      }

      else {
        console.log(1.22);
        if (this.formatDateToNumber(date) < this.formatDateToNumber(this.from)) {
          this.to = this.from;
          this.from = date;
        }

        else {
          this.to = date;
        }
      }

      if (this.from) {
        this.fromLabel.value = this.from;
      }

      if (this.to) {
        this.toLabel.value = this.to;
      }

      console.log('from: ', this.from, 'to: ', this.to, date);
      this.fillDays();

      const curSelected = document.querySelector(`[data-date="${date}"]`);
      curSelected.classList.add('calendar__cell--selected');
    }

  },

  formatDateToNumber(date) {
    const dateArray = date.split('-');
    const numberDate = dateArray[0] + dateArray[1] * 0.01 + dateArray[2] * 0.0001;

    return numberDate;
  },
};

export default calendar;

<!DOCTYPE html>
<html class=''>
<head>
<script src='//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js'></script>
<script src='//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js'></script>
<meta charset='UTF-8'>
<meta name="robots" content="noindex">
<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
<link rel="canonical" href="https://codepen.io/coreybruyere/pen/lrwzH" />
 
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
<style class="cp-pen-styles">
body {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  min-height: 100vh;
  text-align: center;
  font-family: helvetica;
  text-transform: uppercase;
  background-image: -webkit-linear-gradient(285deg, rgba(194, 233, 221, 0.5) 3%, rgba(104, 119, 132, 0.5) 100%);
  background-image: linear-gradient(165deg, rgba(194, 233, 221, 0.5) 3%, rgba(104, 119, 132, 0.5) 100%);
}
 
.countdown {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  width: 75%;
  max-width: 20rem;
  margin: 0 auto;
}
 
.countdown__item {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-flex: 0;
      -ms-flex: 0 1 auto;
          flex: 0 1 auto;
  min-width: 31%;
  margin-bottom: 1rem;
}
 
.countdown__item--large {
  -webkit-box-flex: 1;
      -ms-flex: auto;
          flex: auto;
  width: 100%;
  font-size: 2.75em;
}
 
.countdown__timer {
  padding: .25em;
  background-color: white;
  border: 1px solid black;
  border-radius: 3px;
  font-weight: bold;
  font-size: 2em;
}
 
.countdown__label {
  font-size: 1em;
  padding-top: .40em;
}
.countdown__item--large .countdown__label:before, .countdown__item--large .countdown__label:after {
  content: '';
  display: block;
  height: 1px;
  background-image: -webkit-linear-gradient(left, transparent, rgba(0, 0, 0, 0.4), transparent);
  background-image: linear-gradient(left, transparent, rgba(0, 0, 0, 0.4), transparent);
}
</style></head><body>
<!-- 2017 Countdown - Simple JS, HTML, & CSS only -->
 
<body>
  <div class="countdown" id="js-countdown">
    <div class="countdown__item countdown__item--large">
      <div class="countdown__timer js-countdown-days" aria-labelledby="day-countdown">
 
      </div>
 
      <div class="countdown__label" id="day-countdown">Jours</div>
    </div>
 
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-hours" aria-labelledby="hour-countdown">
 
      </div>
 
      <div class="countdown__label" id="hour-countdown">Heures</div>
    </div>
 
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-minutes" aria-labelledby="minute-countdown">
 
      </div>
 
      <div class="countdown__label" id="minute-countdown">Minutes</div>
    </div>
 
    <div class="countdown__item">
      <div class="countdown__timer js-countdown-seconds" aria-labelledby="second-countdown">
 
      </div>
 
      <div class="countdown__label" id="second-countdown">Secondes</div>
    </div>
  </div>
</body>
 
 
 
 
<!-- 2013 Countdown -->
<!-- <body>
  <form class="countdown" name="countDown">
    <input size="4" name="daysLeft" />
    <hr class="soft">
    <h3>Days</h3>
    <hr class="soft">
    <span class="bottom_time"><input size="3"  name="hrLeft" /></span>
    <span class="bottom_time"><input size="3"  name="minLeft" /></span>
    <span class="bottom_time"><input size="3"  name="secLeft" /></span>
    <ul>
      <li>Hrs</li>
      <li>Min</li>
      <li>Sec</li>
    </ul>
  </form>
</body> -->
<script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script>
<script >'use strict';
 
// ========================== //
// 2017 Countdown JS
// ========================== //
 
var countdown = new Date("October 26, 2017");
 
function getRemainingTime(endtime) {
  var milliseconds = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor(milliseconds / 1000 % 60);
  var minutes = Math.floor(milliseconds / 1000 / 60 % 60);
  var hours = Math.floor(milliseconds / (1000 * 60 * 60) % 24);
  var days = Math.floor(milliseconds / (1000 * 60 * 60 * 24));
 
  return {
    'total': milliseconds,
    'seconds': seconds,
    'minutes': minutes,
    'hours': hours,
    'days': days
  };
}
 
function initClock(id, endtime) {
  var counter = document.getElementById(id);
  var daysItem = counter.querySelector('.js-countdown-days');
  var hoursItem = counter.querySelector('.js-countdown-hours');
  var minutesItem = counter.querySelector('.js-countdown-minutes');
  var secondsItem = counter.querySelector('.js-countdown-seconds');
 
  function updateClock() {
    var time = getRemainingTime(endtime);
 
    daysItem.innerHTML = time.days;
    hoursItem.innerHTML = ('0' + time.hours).slice(-2);
    minutesItem.innerHTML = ('0' + time.minutes).slice(-2);
    secondsItem.innerHTML = ('0' + time.seconds).slice(-2);
 
    if (time.total <= 0) {
      clearInterval(timeinterval);
    }
  }
 
  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}
 
initClock('js-countdown', countdown);
 
// ========================== //
// 2013 Countdown JS
// ========================== //
 
// function counter() {
//   var today = new Date(); //variable contains current date and time
 
//   var days = calcDays(today); //calculate the time left until set date below
//   document.countDown.daysLeft.value = Math.floor(days); // displays days rounded to the next lowest integer
 
//   var hours = (days - Math.floor(days)) * 24; //calculate the hours left in the current day
//   document.countDown.hrLeft.value = Math.floor(hours); // display hours rounded to the next lowest integer
 
//   var minutes = (hours - Math.floor(hours)) * 60; // calculate the minutes left in the current hour
//   document.countDown.minLeft.value = Math.floor(minutes); // display minutes rounded to the next lowest integer
 
//   var seconds = (minutes - Math.floor(minutes)) * 60; //calculate the seconds left in the current minute
//   document.countDown.secLeft.value = Math.floor(seconds); // display seconds rounded to the next lowest integer
// }
 
// function calcDays(currentDate) {
//   //create a date object for date of graduation
//   //calculate the difference between currentDate and set date
//   setDate = new Date("May 6, 2013");
//   currentTime = currentDate.getFullYear() + 1;
//   setDate.setFullYear(currentTime);
 
//   days = (setDate - currentDate) / (1000 * 60 * 60 * 24);
//   return days;
// }
 
// setInterval('counter()', 1000)
//# sourceURL=pen.js
</script>
</body></html>
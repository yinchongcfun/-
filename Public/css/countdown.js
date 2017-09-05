/*!
 * JavaScript Countdown v1.0.0
 * https://github.com/qt06/jscountdown
 *
 * Copyright 2017 qt06
 * Released under the MIT license
 */
;(function (factory) {
	var registeredInModuleLoader = false;
	if (typeof define === 'function' && define.amd) {
		define(factory);
		registeredInModuleLoader = true;
	}
	if (typeof exports === 'object') {
		module.exports = factory();
		registeredInModuleLoader = true;
	}
	if (!registeredInModuleLoader) {
		var OldCountdown = window.Countdown;
		var api = window.Countdown = factory();
		api.noConflict = function () {
			window.Countdown = OldCountdown;
			return api;
		};
	}
}(function () {
function Countdown(year, month,day,hour,minute,second, title, selector) {
this.h = null;
this.interval = 1000; 
this.originalDocumentTitle = document.title;
this.title = title;
this.year = year;
this.month = month;
this.day = day;
this.hour = hour;
this.minute = minute;
this.second = second;
this.selector = selector;
this.el = typeof this.selector === 'string' ? document.querySelector(this.selector) : null;
this.originalHTML = this.el !== null ? this.el.innerHTML : '';
return this;
}
Countdown.prototype.showCountdown = function() {
var now = new Date(); 
var endDate = new Date(this.year, this.month-1, this.day, this.hour, this.minute, this.second); 
var leftTime=endDate.getTime()-now.getTime(); 
if(leftTime < 0) {
clearInterval(this.h);
document.title = this.originalDocumentTitle;
if(this.el !== null) {
this.el.innerHTML = this.originalHTML;
}
return;
}
var leftsecond = parseInt(leftTime/1000); 
//var day1=parseInt(leftsecond/(24*60*60*6)); 
var day=Math.floor(leftsecond/(60*60*24)); 
var hour=Math.floor((leftsecond-day*24*60*60)/3600); 
var minute=Math.floor((leftsecond-day*24*60*60-hour*3600)/60); 
var second=Math.floor(leftsecond-day*24*60*60-hour*3600-minute*60); 
var text = this.title + "："+day+"天"+hour+"小时"+minute+"分"+second+"秒";
document.title = text + " - " + this.originalDocumentTitle;
if(this.el !== null) {
this.el.innerHTML = text;
}
};
Countdown.prototype.setInterval = function() {
var self = this;
self.h = window.setInterval(function(){self.showCountdown();}, self.interval); 
};
return Countdown;
}));

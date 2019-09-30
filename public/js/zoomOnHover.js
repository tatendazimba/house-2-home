/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/zoomOnHover.js":
/*!*************************************!*\
  !*** ./resources/js/zoomOnHover.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// this component displays an image with the width of the parent element and on hover shows
// the full image or a scaled image in the image area.
// features: activate/deactivate method, active/inactive on load, scale parameter, separate zoom image,
// event when all images loaded, event when images resized (responsive css, etc)
function pageOffset(el) {
  // -> {x: number, y: number}
  // get the left and top offset of a dom block element
  var rect = el.getBoundingClientRect(),
      scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return {
    y: rect.top + scrollTop,
    x: rect.left + scrollLeft
  };
}

var zoomOnHover = {
  props: ["imgNormal", "imgZoom", "scale", "disabled"],
  template: "<div class=\"zoom-on-hover\" @mousemove=\"move\" @mouseenter=\"zoom\" @mouseleave=\"unzoom\">" + "<img class=\"normal\" ref=\"normal\" :src=\"imgNormal\"/>" + "<img class=\"zoom\" ref=\"zoom\" :src=\"imgZoom || imgNormal\"/>" + "</div>",
  data: function data() {
    return {
      scaleFactor: 1,
      resizeCheckInterval: null
    };
  },
  methods: {
    zoom: function zoom() {
      if (this.disabled) return;
      this.$refs.zoom.style.opacity = 1;
      this.$refs.normal.style.opacity = 0;
    },
    unzoom: function unzoom() {
      if (this.disabled) return;
      this.$refs.zoom.style.opacity = 0;
      this.$refs.normal.style.opacity = 1;
    },
    move: function move(event) {
      if (this.disabled) return;
      var offset = pageOffset(this.$el);
      var zoom = this.$refs.zoom;
      var normal = this.$refs.normal;
      var relativeX = event.clientX - offset.x + window.pageXOffset;
      var relativeY = event.clientY - offset.y + window.pageYOffset;
      var normalFactorX = relativeX / normal.offsetWidth;
      var normalFactorY = relativeY / normal.offsetHeight;
      var x = normalFactorX * (zoom.offsetWidth * this.scaleFactor - normal.offsetWidth);
      var y = normalFactorY * (zoom.offsetHeight * this.scaleFactor - normal.offsetHeight);
      zoom.style.left = -x + "px";
      zoom.style.top = -y + "px";
    },
    initEventLoaded: function initEventLoaded() {
      // emit the "loaded" event if all images have been loaded
      var promises = [this.$refs.zoom, this.$refs.normal].map(function (image) {
        return new Promise(function (resolve, reject) {
          image.addEventListener("load", resolve);
          image.addEventListener("error", reject);
        });
      });
      var component = this;
      Promise.all(promises).then(function () {
        component.$emit("loaded");
      });
    },
    initEventResized: function initEventResized() {
      var normal = this.$refs.normal;
      var previousWidth = normal.offsetWidth;
      var previousHeight = normal.offsetHeight;
      var component = this;
      this.resizeCheckInterval = setInterval(function () {
        if (previousWidth != normal.offsetWidth || previousHeight != normal.offsetHeight) {
          previousWidth = normal.offsetWidth;
          previousHeight = normal.offsetHeight;
          component.$emit("resized", {
            width: normal.width,
            height: normal.height,
            fullWidth: normal.naturalWidth,
            fullHeight: normal.naturalHeight
          });
        }
      }, 1000);
    }
  },
  mounted: function mounted() {
    if (this.$props.scale) {
      this.scaleFactor = parseInt(this.$props.scale);
      this.$refs.zoom.style.transform = "scale(" + this.scaleFactor + ")";
    }

    this.initEventLoaded();
    this.initEventResized();
  },
  updated: function updated() {
    this.initEventLoaded();
  },
  beforeDestroy: function beforeDestroy() {
    this.resizeCheckInterval && clearInterval(this.resizeCheckInterval);
  }
};

/***/ }),

/***/ 3:
/*!*******************************************!*\
  !*** multi ./resources/js/zoomOnHover.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/house2home-co-zw/resources/js/zoomOnHover.js */"./resources/js/zoomOnHover.js");


/***/ })

/******/ });